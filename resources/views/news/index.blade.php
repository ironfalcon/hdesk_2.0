@extends('layouts.app')

@section('content')


    <div class="container mid-ground">
        <div class="row" >
        <div class="col-xs-10 col-xs-offset-1">
        <h3 style="display: inline;">Новости факультета</h3>
        @if(Auth::user()->permission()->value('name') == 'admin')
        <a href="{{ route('news.create') }}" class="btn btn-primary" style="float:right;">Создать</a>
        @endif
        <br>
        </div>
        </div>
        <div class="row col-xs-10 col-xs-offset-1"> 
            
        @foreach($news as $new)
        <div class="card">
            <div class="card-head">
                <img src="/uploads/news_photo/{{ $new->photo }}">
            </div>
            <div class="card-content">
                <h4 id="title-card">{{$new->title}}</h4>
                <p>{{$new->description}}</p>
                <br>
            </div>
            <div class="but-news">
                <a href="{{ route('news.show', $new->id) }}" class="btn btn-primary news-but">Подробнее</a>
                
            </div>
        </div>
        @endforeach


        </div>
    </div>

@endsection('content')
