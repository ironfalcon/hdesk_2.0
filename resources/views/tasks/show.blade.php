@extends('layouts.app')

@section('content')
@include('errors')

    <div class="container" style="background-image:url('http://h-desk/middleground/11.png');padding: 30px 30px" >
            <div class="row">
                <div class="col-xs-12" >
                <h3>Информация о выдаче.</h3>
                    <table class="table" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                        <tr>
                            <td class="col-xs-4">ID</td>
                            <td class="col-xs-4">{{$task->id}}</td>
                        </tr>
                        <tr>
                            <td class="col-xs-4">Наименование</td>
                            <td class="col-xs-4">{{$task->elements}}</td>
                        </tr>
                        <tr>
                            <td class="col-xs-4">Аудитория</td>
                            <td>{{$task->aud}}</td>
                        </tr>
                        <tr>
                            <td class="col-xs-4">Выдающий</td>
                            <td class="col-xs-4">{{$task->created_user}}</td>
                        </tr>
                        <tr>
                            <td class="col-xs-4">Дата создания</td>
                            <td class="col-xs-4">{{$task->created_at}}</td>
                        </tr>
                        <tr>
                            <td class="col-xs-4">Дата обновления</td>
                            <td class="col-xs-4">{{$task->updated_at}}</td>
                        </tr>
                        <tr>
                            <td class="col-xs-4">Принимающий</td>
                            <td class="col-xs-4">{{$task->updated_user}}</td>
                        </tr>
                        <tr>
                            <td class="col-xs-4">Статус</td>
                            <td class="col-xs-4">{{$task->status}}</td>
                        </tr>
                        <tr>
                            <td class="col-xs-4">Описание</td>
                            <td class="col-xs-4">{{$task->description}}</td>
                        </tr>
                    </table>
                    <a href="{{ route('tasks.edit', $task->id) }}">
                        <button class="btn btn-warning">Edit</button>
                    </a>

                </div>
            </div>
    </div>

@endsection('content')