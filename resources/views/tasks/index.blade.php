@extends('layouts.app')

@section('content')

<style>
.cd{
    display:inline;
}
</style>
    <div class="container">
        <h3>Список выданного оборудования</h3>
        <a href="{{ route('tasks.create') }}" class="btn btn-success">Создать</a>
        <div class="row">  
            <div class="col-md-8 col-md-offset-2">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Наименование</td>
                            <td>Аудитория</td>
                            <td>Статус</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                    @if($task->status == 'Выдано')
                        <tr class="bg-danger">
                    @else
                        <tr class="bg-success">
                    @endif
                            <td class="col-md-1">{{$task->id}}
                            </td>
                            <td class="col-md-3">
                                <a href="{{ route('tasks.show', $task->id) }}">
                                {{$task->elements}}
                                </a>
                            </td>
                            <td class="col-md-1">{{$task->aud}}
                            </td>
                            <td class="col-md-1">{{$task->status}}
                            </td>
                            <td class="col-md-4">
                                <a href="{{ route('tasks.show', $task->id) }}">
                                <button class="btn btn-success">Show</button>    
                                </a>
                    
                                <a href="{{ route('tasks.edit', $task->id) }}">
                                <button class="btn btn-warning">Edit</button>
                                </a>


                                
                                {!! Form::open(['method' => 'DELETE', 'route' => ['tasks.destroy', $task->id] ])!!}
                                <button class="btn btn-danger cd" onclick="return confirm('Вы уверены?')">Delete</button>
                                {!! Form::close() !!}
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection('content')
