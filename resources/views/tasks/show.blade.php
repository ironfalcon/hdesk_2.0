@extends('layouts.app')

@section('content')
@include('errors')


<div class="panel panel-primary col-md-8 col-md-offset-2" style="padding-left: 0px;padding-right: 0px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);border: none;">
    <div class="panel-heading">Заявка {{$task->id}} | {{$task->title}}
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-info btn-sm" style="float: right;margin-right: -10px;margin-left: 1px;margin-top: -5px">
            <span class="glyphicon glyphicon-pencil"></span> Изменить
        </a>
        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#postComment" style="float: right;margin-right: 5px;margin-left: 10px;margin-top: -5px">
            <span class="glyphicon glyphicon-envelope"></span> Добавить комментарий
        </a>
    </div>

    <div class="panel-body" style="padding: 0px;">
            <div class="row" style="margin: 20px 0px;">
                <div class="col-md-7 " style=" box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);margin: 4px 25px;padding: 10px 10px;">
                    <h1>{{$task->id}} | {{$task->title}}</h1>
                    <hr>
                    <p>{{$task->description}}</p>
                    <hr>
                    <p>Приоритет: {{$task->priority($task->priority_id)->name}}</p>
                    <hr>
                    <p>Статус выполнения: {{$task->priority($task->status_id)->name}}</p>
                    <hr>
                    <p>Место нахождения: {{$task->location($task->location_id)->name}}</p>
                    <hr>
                    <p>Прикрепленное изображение: <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">{{$task->attachments}}</button> </p>

                </div>
                <div class="col-md-4" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);margin: 4px 25px;padding: 10px 10px;">
                    <p>Дата создания: {{$task->create_date}}</p>
                    <hr>
                    <p>Дата обновления: {{$task->update_date}}</p>
                    <hr>
                    <p>Дата закрытия: {{$task->close_date}}</p>
                    <hr>
                    <p>Создал: {{$task->user($task->creator_id)->name}}</p>
                    <hr>
                    <p>Исполняет: {{$task->user($task->assigned_id)->name}}</p>

                </div>

            </div>
        <div class="row" style=" margin-left: 0px; margin-right: 0px;margin-bottom: 10px;">
            @foreach($comments as $comment)
            <div class="col-md-7" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); margin: 4px 25px; padding: 10px 10px;">
                <div class="col-md-1">
                    <img src="/uploads/avatars/{{$comment->user($comment->user_id)->avatar}}" style=" width:50px; height:50px; border-radius:50%;">
                </div>
               <div class="col-md-11">
                    <p>{{$comment->user($comment->user_id)->name}}</p>
                    <p> {{$comment->text}}</p>
                    <p> {{$comment->post_date}}</p>
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

    </div>
</div>

@endsection('content')