@extends('layouts.app')

@section('content')
@include('errors')

    <div class="container">
        
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Создание новости</div>
                <div class="row">
            
               
                <form enctype="multipart/form-data" action="{{ route('news.store') }}" method="POST">
                {{ csrf_field() }}
               <div class="form-group col-xs-8 col-xs-offset-2">
               <br>
                <h5>Заголовок<h5>
               <input type="text" class="form-control" name="title" value="{{ old('title')}}">
               <br>
                <h5>Краткое описание</h5>
               <input type="text" class="form-control" name="description" value="{{ old('description')}}">
               <br>
                <h5>Текст новости</h5>
                <textarea name="body" id="" cols="30" rows="5" class="form-control">
               {{old('body')}}
               </textarea>
               <br>
                Картинка
                <input type="file" class="btn btn-success" name="photo" value="{{ old('photo')}}">
               <br>
               <button class="btn btn-success">Submit</button>
               </div>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection('content')
