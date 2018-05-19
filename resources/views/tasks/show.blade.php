@extends('layouts.app')

@section('content')
@include('errors')


<div class="panel panel-primary col-md-8 col-md-offset-2" style="padding-left: 0px; padding-right: 0px;">
    <div class="panel-heading">Заявка {{$task->id}} | {{$task->title}}
        <a href="{{ route('tasks.edit', $task->id) }}">
            <button class="btn btn-warning">Изменить</button>
        </a>
    </div>

    <div class="panel-body" style="padding: 0px;">
            <div class="row" style="margin: 0px 0px;">
                <div class="col-md-7 col-md-offset-1" style="border-right: solid 1px;">
                    <h1>{{$task->id}} | {{$task->title}}</h1>
                    <p>{{$task->description}}</p>
                    <p>Приоритет: {{$task->priority($task->priority_id)->name}}</p>
                    <p>Статус выполнения: {{$task->priority($task->status_id)->name}}</p>
                    <p>Место нахождения: {{$task->location($task->location_id)->name}}</p>
                    <p>Прикрепленное изображение: <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">{{$task->attachments}}</button> </p>
                    <hr>
                    @foreach($comments as $comment)
                        <p> {{$comment->text}} {{$comment->user($comment->user_id)->name}}</p>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <p>Дата создания: {{$task->create_date}}</p>
                    <p>Дата обновления: {{$task->update_date}}</p>
                    <p>Дата закрытия: {{$task->close_date}}</p>
                    <p>Создал: {{$task->user($task->creator_id)->name}}</p>
                    <p>Исполняет: {{$task->user($task->assigned_id)->name}}</p>

                </div>

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
                        <img src="/uploads/task_photo/{{$task->attachments}}">
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection('content')