@extends('layouts.app')

@section('content')
@include('errors')

<div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2 mid-ground">
           
           <div>
           <div>
                Сообщение от пользователя: {{ $users->find($message->from_user_id)->name }}
           </div>
           <hr>
           <div>
                {{ $message->body }}
           </div>
           <hr>
           <div>
            Дата отправки {{ $message->date_send }}
           </div>
           </div>
            
        </div>
    </div>
</div>


@endsection('content')