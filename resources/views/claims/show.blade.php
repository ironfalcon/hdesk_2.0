@extends('layouts.app')

@section('content')
@include('errors')

<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <h3>Заявка пользователя:{{$claim->author}} </h3>
            <table class="table">
                <tr>
                    <td class="col-xs-4">ID</td>
                    <td class="col-xs-8">{{$claim->id}}</td>
                </tr>
                <tr>
                    <td class="col-xs-4">Текст</td>
                    <td class="col-xs-8">{{$claim->body}}</td>
                </tr>
                <tr>
                    <td class="col-md-4">Автор</td>
                    <td class="col-xs-8">{{$claim->author}}</td>
                </tr>
                <tr>
                    <td class="col-xs-4">Желаемая дата исполнения</td>
                    <td class="col-xs-8">{{$claim->desired_date}}</td>
                </tr>
                <tr>
                    <td class="col-xs-4">Дата создания</td>
                    <td class="col-xs-8">{{$claim->created_at}}</td>
                </tr>
                <tr>
                    <td class="col-xs-4">Местоположение</td>
                    <td class="col-xs-8">{{$claim->place}}</td>
                </tr>
                <tr>
                    <td class="col-xs-4">Статус</td>
                    <td class="col-xs-8">{{$claim->status}}</td>
                </tr>
            </table>
            @if(Auth::user()->permission()->value('name') == 'admin')
                <a href="{{ route('claims.edit', $claim->id) }}">
                    <button class="btn btn-warning">Изменить</button>
                </a>
            @endif
        </div>
    </div>
</div>


@endsection('content')