@extends('layouts.app')

@section('content')
@include('errors')

    <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h3>{{$news->title}}</h3>
                <br>
                <div class="col-xs-6">
                    <img src="/uploads/news_photo/{{ $news->photo }}" style="max-height:700px; width:100%; margin-bottom: 30px;">
                </div>

                <div style="margin-left: 20px;"> 
                    <p>{{$news->body}}</p>
                </div>
                @if(Auth::user()->permission()->value('name') == 'admin')
                <div class="col-xs-12" style="margin-bottom: 40px;">
                    <a href="{{ route('news.edit', $news->id) }}">
                        <button class="btn btn-warning" style="float:left;">Редактировать</button>
                    </a>
               
                    {!! Form::open(['method' => 'DELETE', 'route' => ['news.destroy', $news->id] ])!!}
                        <button class="btn btn-danger cd" onclick="return confirm('Вы уверены?')" style="float:right;">Удалить</button>
                    {!! Form::close() !!}
                </div>
                @endif
            </div>
    </div>

@endsection('content')