@extends('layouts.app')

@section('content')

<style>
.cd{
    display:inline;
}
</style>
    <div class="container">
    @if(Auth::user()->permission()->value('name') == 'admin' || Auth::user()->permission()->value('name') == 'sotr')
    <a href="{{ route('messages.create') }}" class="btn btn-success" style="float:right;">Создать</a>
    @endif
        <h3>Мои сообщения:</h3>
        <div class="row">  
            <div class="col-xs-10 col-xs-offset-1">
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

@endsection('content')
