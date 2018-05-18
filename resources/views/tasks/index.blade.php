@extends('layouts.app')

@section('content')

<style>
.cd{
    display:inline;
}
</style>

<div class="panel panel-primary col-md-4 col-md-offset-1" style="padding-left: 0px; padding-right: 0px;">
    <div class="panel-heading">Заявки</div>

    <div class="panel-body" style="padding: 0px;">
        <div class="" style="">
            <table class="table">
                <thead>
                <tr class="active">
                    <td>ID</td>
                    <td>Заголовок</td>
                    <td>Создал</td>
                    <td>Приоритет</td>
                </tr>
                </thead>
                <tbody style="">
                @foreach($tasks as $task)
                    <tr>
                            <td class="col-md-1">
                                {{$task->id}}
                            </td>

                            <td class="col-md-3">
                                <a href="{{ route('tasks.show', $task->id) }}">{{$task->title}}</a>
                            </td>

                            <td class="col-md-1">
                                {{$task->user($task->creator_id)->name}}
                            </td>

                            <td class="col-md-1">
                                {{$task->priority()->find($task->priority_id)->name}}
                            </td>

                        </tr>
                        @endforeach
                </tbody>
            </table>
            {{ $tasks->links() }}
        </div>
    </div>
</div>


<div class="panel panel-primary col-md-4 col-md-offset-1" style="padding-left: 0px; padding-right: 0px;">
    <div class="panel-heading">Заявки</div>

    <div class="panel-body" style="padding: 0px;">
        <div class="" style="">
            <table class="table">
                <thead>
                <tr class="active">
                    <td>ID</td>
                    <td>Заголовок</td>
                    <td>Создал</td>
                    <td>Приоритет</td>
                </tr>
                </thead>
                <tbody style="">
                @foreach($tasks as $task)
                    <tr>
                        <td class="col-md-1">
                            {{$task->id}}
                        </td>

                        <td class="col-md-3">
                            <a href="{{ route('tasks.show', $task->id) }}">{{$task->title}}</a>
                        </td>

                        <td class="col-md-1">
                            {{$task->user($task->creator_id)->name}}
                        </td>

                        <td class="col-md-1">
                            {{$task->priority()->find($task->priority_id)->name}}
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $tasks->links() }}
        </div>
    </div>
</div>

@endsection('content')
