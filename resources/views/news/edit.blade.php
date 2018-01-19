@extends('layouts.app')

@section('content')
@include('errors')

    <div class="container">
        <h3>Изменеие записи # {{$news->id}}</h3>

        <div class="row">
            <div class="col-md-12">
               

            {!! Form::open(['route' => ['news.update', $news->id], 'method' => 'PUT', 'files' => true]) !!}
            <!--<form enctype="multipart/form-data" action="{{ route('news.update', $news->id) }}" method="PUT">
                {{ csrf_field() }}-->
               <div class="form-group col-xs-8 col-xs-offset-2">
               <br>
                <h5>Заголовок<h5>
               <input type="text" class="form-control" name="title" value="{{ $news->title}}">
               <br>
                <h5>Краткое описание</h5>
               <input type="text" class="form-control" name="description" value="{{ $news->description}}">
               <br>
                <h5>Текст новости</h5>
                <textarea name="body" id="" cols="30" rows="5" class="form-control">
                {{ $news->body}}
               </textarea>
               <br>
                Картинка
                <input type="file" class="btn btn-success" name="photo">
               <br>
               <button class="btn btn-success">Submit</button>
               </div>
               {!! Form::close() !!}
           <!-- </form>-->
            </div>
        </div>
    </div>

@endsection('content')