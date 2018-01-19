@extends('layouts.app')

@section('content')
@include('errors')

    <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                <h3>Информация о выдаче.</h3>
                    <table class="table">
                        <tr>
                            <td class="col-md-4">ID</td>
                            <td class="col-md-4">{{$task->id}}</td>
                        </tr>
                        <tr>
                            <td class="col-md-4">Наименование</td>
                            <td class="col-md-4">{{$task->elements}}</td>
                        </tr>
                        <tr>
                            <td class="col-md-4">Аудитория</td>
                            <td>{{$task->aud}}</td>
                        </tr>
                        <tr>
                            <td class="col-md-4">Выдающий</td>
                            <td class="col-md-4">{{$task->created_user}}</td>
                        </tr>
                        <tr>
                            <td class="col-md-4">Дата создания</td>
                            <td class="col-md-4">{{$task->created_at}}</td>
                        </tr>
                        <tr>
                            <td class="col-md-4">Дата обновления</td>
                            <td class="col-md-4">{{$task->updated_at}}</td>
                        </tr>
                        <tr>
                            <td class="col-md-4">Принимающий</td>
                            <td class="col-md-4">{{$task->updated_user}}</td>
                        </tr>
                        <tr>
                            <td class="col-md-4">Статус</td>
                            <td class="col-md-4">{{$task->status}}</td>
                        </tr>
                        <tr>
                            <td class="col-md-4">Описание</td>
                            <td class="col-md-4">{{$task->description}}</td>
                        </tr>
                    </table>
                    <a href="{{ route('tasks.edit', $task->id) }}">
                        <button class="btn btn-warning">Edit</button>
                    </a>

                </div>
            </div>
    </div>

@endsection('content')