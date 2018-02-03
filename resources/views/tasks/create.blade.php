@extends('layouts.app')

@section('content')
@include('errors')

    <div class="container">
        <h3>Выдаваемое оборудование</h3>

        <div class="row col-xs-10 col-xs-offset-1" style="background-color: #ecf0f1; padding: 30px 30px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">

               
               {!! Form::open(['route' => ['tasks.store']]) !!}
               <div class="form-group">
                   <label for="elements">Оборудование:</label>
                   <input type="text" class="form-control" id="elements" name="elements" value="{{ old('element')}}">
               <br>
                   <label for="aud">Аудитория:</label>
                   <input type="text" class="form-control" id="aud" name="aud" value="{{ old('aud')}}">

                    <input type="hidden" class="form-control" name="created_user" value="{{ Auth::user()->name }}">
               <br>
                   <label for="description">Описание:</label>
                   <textarea name="description" id="description"  rows="5" class="form-control">{{old('description')}}</textarea>
               <br>
               <button class="btn btn-success">Подтвердить</button>
               </div>
               {!! Form::close() !!}

        </div>
    </div>

@endsection('content')
