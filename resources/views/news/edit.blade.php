@extends('layouts.app')

@section('content')
@include('errors')

    <div class="container mid-ground">
        <h3>Изменеие записи # {{$news->title}}</h3>

        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
               

            {!! Form::open(['route' => ['news.update', $news->id], 'method' => 'PUT', 'files' => true]) !!}
            <!--<form enctype="multipart/form-data" action="{{ route('news.update', $news->id) }}" method="PUT">
                {{ csrf_field() }}-->
               <div class="form-group">
               <br>
                   <label for="title">Заголовок:</label>
                   <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
               <br>
                   <label for="description">Краткое описание:</label>
                   <input type="text" class="form-control" id="description" name="description" value="{{ $news->description }}">
               <br>
                   <label for="body">Текст новости:</label>
                   <textarea name="body" id="body"  rows="5" class="form-control">{{ $news->body }}</textarea>
               <br>
                   <label for="photo">Картинка:</label>
                   <input type="file" class="btn btn-success" id="photo" name="photo">
               <br>
               <button class="btn btn-success">Подтвердить</button>
               </div>
               {!! Form::close() !!}
           <!-- </form>-->
            </div>
        </div>
    </div>

@endsection('content')