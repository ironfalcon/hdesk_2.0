@extends('layouts.app')

@section('content')

<style>
.cd{
    display:inline;
}
</style>
    <div class="container">
        <h3>Ваши оповещения:</h3>
        <div class="row">  
            <div class="col-xs-10 col-xs-offset-1">
                <table class="table">
                    <thead>
                        <tr>
                            <td>От кого</td>
                            <td>Кому</td>
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
                                <!-- $user->find($message->from_user_id)->name-->
                                {{ $message->user()->value('name') }}
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection('content')
