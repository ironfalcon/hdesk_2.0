@extends('layouts.app')

@section('content')

<style>
.cd{
    display:inline;
}
</style>
    <div class="container">
        <h3 style="float:left;display: inline;margin-left: 81px;">Мои сообщения:</h3>
    {{--@if(Auth::user()->permission()->value('name') == 'admin' || Auth::user()->permission()->value('name') == 'sotr')--}}
    <a href="{{ route('messages.create') }}" class="btn btn-success" style="float:right;margin-top: 15px;margin-right: 84px;">Создать</a>
    {{--@endif--}}



        <ul class="nav nav-pills" style="float: left;display: inline;margin-top: 14px;margin-left: 40px">
            <li class="active"><a data-toggle="pill" href="#incoming">Входящие</a></li>
            <li><a data-toggle="pill" href="#outgoing">Исходящие</a></li>
        </ul>

        <div class="tab-content">
            <div id="incoming" class="tab-pane fade in active">

                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1" style="background-color:#ecf0f1;padding: 30px 30px;
                    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);margin-top: 10px;">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>От кого</td>
                                <td>текст</td>
                                <td>Дата</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                @if($message->unread == '1')
                                    <tr class="bg-danger">
                                @else
                                    <tr class="bg-success">
                                @endif
                                        <td class="col-xs-1">
                                        {{ $users->find($message->from_user_id)->name }}
                                        <!-- {{ $id = $message->from_user_id }}-->
                                        <!-- {{ $message->user()->where('id', $id)->value('id') }}-->
                                        </td>
                                        <td class="col-xs-1">
                                            <!-- $user->find($message->from_user_id)->name-->
                                            <a href="{{ route('messages.show', $message->id) }}">
                                                {{ $message->body }}
                                            </a>
                                        </td>
                                        <td class="col-xs-1">
                                            <!-- $user->find($message->from_user_id)->name-->
                                            {{ $message->date_send }}
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div id="outgoing" class="tab-pane fade">

                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1" style="background-color:#ecf0f1;padding: 30px 30px;
                    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);margin-top: 10px;">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>Кому</td>
                                <td>текст</td>
                                <td>Дата</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messagesFrom as $message)
                                @if($message->unread == '1')
                                    <tr class="bg-danger">
                                @else
                                    <tr class="bg-success">
                                        @endif


                                        <td class="col-xs-1">
                                        {{ $users->find($message->to_user_id)->name }}
                                        <!-- {{ $id = $message->to_user_id }}-->
                                        <!-- {{ $message->user()->where('id', $id)->value('id') }}-->
                                        </td>
                                        <td class="col-xs-1">
                                            <!-- $user->find($message->from_user_id)->name-->
                                            <a href="{{ route('messages.show', $message->id) }}">
                                                {{ $message->body }}
                                            </a>
                                        </td>
                                        <td class="col-xs-1">
                                            <!-- $user->find($message->from_user_id)->name-->
                                            {{ $message->date_send }}
                                        </td>


                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>



</div>

@endsection('content')
