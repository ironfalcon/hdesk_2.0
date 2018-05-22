@extends('layouts.app')

@section('content')
@include('errors')

<div class="panel panel-primary col-md-10 col-md-offset-1" style="padding-left: 0px;padding-right: 0px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);border: none;">
    <div class="panel-heading">Заявка {{$task->id}} | {{$task->title}}
        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#history" style="float: right;margin-right: -10px;margin-left: 1px;margin-top: -5px">
            <span class="glyphicon glyphicon-list-alt"></span> История
        </a>
        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#postComment" style="float: right;margin-right: 5px;margin-left: 10px;margin-top: -5px">
            <span class="glyphicon glyphicon-envelope"></span> Добавить комментарий
        </a>
    </div>

    <div class="panel-body" style="padding: 0px;">
            <div class="row" style="margin: 20px 0px;">
                <div class="col-md-7" style=" box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);margin: 4px 15px;padding: 10px 10px;">
                    <h1>{{$task->id}} | {{$task->title}}</h1>
                    <hr>
                    <p>Описание: {{$task->description}}
                        @if((Auth::user()->permission()->value('name') == 'admin') || ($task->creator_id == Auth::user()->id))
                            <a href="#" data-toggle="modal" data-target="#changeDescription">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        @endif
                    </p>
                    <hr>
                    <p>Приоритет: {{$task->priority($task->priority_id)->name}}
                        @if(Auth::user()->permission()->value('name') == 'admin')
                            <a href="#" data-toggle="modal" data-target="#changePriority">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        @endif
                    </p>
                    <hr>
                    <p>Статус выполнения: {{$task->status($task->status_id)->name}}
                        @if(Auth::user()->permission()->value('name') == 'admin')
                            <a href="#" data-toggle="modal" data-target="#changeStatus">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        @endif
                    </p>
                    <hr>
                    <p>Место нахождения: {{$task->location($task->location_id)->name}}</p>
                    <hr>
                    <p>Прикрепленное изображение: <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">{{$task->attachments}}</button> </p>

                </div>
                <div class="col-md-4 col-sm-11" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);margin: 4px 15px;padding: 10px 10px; float: right;">
                    <p>Дата создания: {{$task->create_date}}</p>
                    <hr>
                    <p>Дата обновления: {{$task->update_date}}</p>
                    <hr>
                    <p>Дата закрытия: {{$task->close_date}}</p>
                    <hr>
                    <p>Создал: {{$task->user($task->creator_id)->name}}</p>
                    <hr>
                    <p>Исполняет: {{$task->user($task->assigned_id)->name}}
                        @if(Auth::user()->permission()->value('name') == 'admin')
                            <a href="#" data-toggle="modal" data-target="#changeAssigned">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        @endif
                    </p>

                </div>

            </div>

        <div class="row" style=" margin-left: 0px; margin-right: 0px;margin-bottom: 10px;">
            @foreach($comments as $comment)
            <div class="col-md-7" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); margin: 5px 15px; padding: 10px 10px;">
                <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2" style="height: 100%;">
                    <img src="/uploads/avatars/{{$comment->user($comment->user_id)->avatar}}" style=" width:50px; height:50px; border-radius:50%;">
                </div>
               <div class="col-md-10">
                   @if((Auth::user()->permission()->value('name') == 'admin') || ($comment->user_id == Auth::user()->id))
                        {!! Form::open(['method' => 'DELETE', 'route' => ['delete_comment', $comment->id] ])!!}
                        <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" class="form-control" name="task_id" value="{{ $task->id }}">
                        <button class="btn btn-link" onclick="return confirm('Вы уверены?')" style="float:right;">x</button>
                        {!! Form::close() !!}
                   @endif
                    <p>{{$comment->user($comment->user_id)->name}}</p>
                    <p> {{$comment->text}}</p>
                    <p> {{$comment->post_date}}</p>

               </div>
               </div>

            </div>
            @endforeach


        </div>

        <!--Модальное окно для вывода фото-->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Изображение</h4>
                    </div>
                    <div class="modal-body">
                        <img src="/uploads/task_photo/{{$task->attachments}}" style="max-width: 800px;">
                    </div>

                </div>
            </div>
        </div>

        {{--Добавление комментариев--}}
        <div class="modal fade" id="postComment" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Новый комментарий</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['route' => ['add_comment']]) !!}
                        <div class="form-group">
                            <label for="text">Текст комментария:</label>
                            <textarea class="form-control" rows="5" id="text" name="text"></textarea>
                            <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" class="form-control" name="comment_to_id" value="{{$task->id}}">
                            <br>
                            <button class="btn btn-success">Отправить</button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>

        {{--Изменение приоритета--}}
        <div class="modal fade" id="changePriority" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Выбор приоритета</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['route' => ['tasks.update', $task->id], 'method' => 'PUT']) !!}
                        <div class="form-group">
                            <label for="priority_id">Приоритет:</label>
                            <br>
                            <select class="form-control" id="priority_id" name="priority_id">
                                @foreach($priorities as $priority)
                                    <option value="{{$priority->id}}">{{$priority->name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
                            <button class="btn btn-success">Отправить</button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>

        {{--Изменение статуса--}}
        <div class="modal fade" id="changeStatus" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Выбор статуса</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['route' => ['tasks.update', $task->id], 'method' => 'PUT']) !!}
                        <div class="form-group">
                            <label for="status_id">Статус:</label>
                            <br>
                            <select class="form-control" id="status_id" name="status_id">
                                @foreach($statuses as $status)
                                    <option value="{{$status->id}}">{{$status->name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
                            <button class="btn btn-success">Отправить</button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>


        {{--Изменение исполнителя--}}
        <div class="modal fade" id="changeAssigned" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Выбор исполняющего</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['route' => ['tasks.update', $task->id], 'method' => 'PUT']) !!}
                        <div class="form-group">
                            <label for="assigned_id">Исполняющий:</label>
                            <br>
                            <select class="form-control" id="assigned_id" name="assigned_id">
                                @foreach($users_admin as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
                            <button class="btn btn-success">Отправить</button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>


        {{--Изменение описания--}}
        <div class="modal fade" id="changeDescription" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Изменение описания</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['route' => ['tasks.update', $task->id], 'method' => 'PUT']) !!}
                        <div class="form-group">
                            <label for="description">Описание заявки:</label>
                            <br>
                            <textarea name="description" id="description" rows="5" class="form-control">{{  $task->description }}</textarea>
                            <br>
                            <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
                            <button class="btn btn-success">Отправить</button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>


        <!--Модальное окно для просмотра истории изменений-->
        <div class="modal fade" id="history" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">История изменений</h4>
                    </div>
                    <div class="modal-body">
                        @foreach($history as $history_part)
                            <p>{{$history_part->created_at }} | {{ $history_part->action}}</p>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>

@endsection('content')