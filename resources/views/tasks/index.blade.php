@extends('layouts.app')

@section('content')

<style>
.cd{
    display:inline;
}
</style>

@if(Auth::user()->permission()->value('name') == 'admin')
<div class="row">
<div class="panel panel-primary col-md-4 col-md-offset-1" style="padding-left: 0px; padding-right: 0px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);border: none;">
    <div class="panel-heading">Заявки не назначеные</div>

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
                @foreach($unsigned_tasks as $task)
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
                                {{$task->priority($task->priority_id)->name}}
                            </td>

                        </tr>
                        @endforeach
                </tbody>
            </table>
            {{ $unsigned_tasks->links() }}
        </div>
    </div>
</div>


<div class="panel panel-primary col-md-4 col-md-offset-1" style="padding-left: 0px; padding-right: 0px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);border: none;">
    <div class="panel-heading">Заявки назначеные мне</div>

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
                @foreach($my_tasks as $task)
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
                            {{$task->priority($task->priority_id)->name}}
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $my_tasks->links() }}
        </div>
    </div>
</div>

</div>

<div class="row">
<div class="panel panel-primary col-md-4 col-md-offset-1" style="padding-left: 0px; padding-right: 0px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);border: none;">
    <div class="panel-heading">Все заявки</div>

    <div class="panel-body" style="padding: 0px;">
        <div class="" style="">
            <table class="table">
                <thead>
                <tr class="active">
                    <td>ID</td>
                    <td>Заголовок</td>
                    <td>Создал</td>
                    <td>Приоритет</td>
                    <td>Закрыта</td>
                </tr>
                </thead>
                <tbody style="">
                @foreach($tasks as $task)
                    <tr>
                        <td class="col-md-1">
                            {{$task->id}}
                        </td>

                        <td class="col-md-8">
                            <a href="{{ route('tasks.show', $task->id) }}">{{$task->title}}</a>
                        </td>

                        <td class="col-md-2">
                            {{$task->user($task->creator_id)->name}}
                        </td>

                        <td class="col-md-1">
                            {{$task->priority($task->priority_id)->name}}
                        </td>

                        <td class="">
                            @if($task->status_id == 4)
                                <span style="display:flex;justify-content:center;" class="glyphicon">&#xe013;</span>
                            @endif
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $tasks->links() }}
        </div>
    </div>
</div>
</div>

@elseif(Auth::user()->permission()->value('name') == 'stud')

    <div class="panel panel-primary col-md-4 col-md-offset-1" style="padding-left: 0px; padding-right: 0px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);border: none;">
        <div class="panel-heading">Мои заявки</div>

        <div class="panel-body" style="padding: 0px;">
            <div class="" style="">
                <table class="table">
                    <thead>
                    <tr class="active">
                        <td>ID</td>
                        <td>Заголовок</td>
                        <td>Создал</td>
                        <td>Приоритет</td>
                        <td>Закрыта</td>
                    </tr>
                    </thead>
                    <tbody style="">
                    @foreach($user_tasks as $task)
                        <tr>
                            <td class="col-md-1">
                                {{$task->id}}
                            </td>

                            <td class="col-md-8">
                                <a href="{{ route('tasks.show', $task->id) }}">{{$task->title}}</a>
                            </td>

                            <td class="col-md-2">
                                {{$task->user($task->creator_id)->name}}
                            </td>

                            <td class="col-md-1">
                                {{$task->priority($task->priority_id)->name}}
                            </td>

                            <td class="">
                                @if($task->status_id == 4)
                                    <span style="display:flex;justify-content:center;" class="glyphicon">&#xe013;</span>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $my_tasks->links() }}
            </div>
        </div>
    </div>
    </div>
@endif
@endsection('content')
