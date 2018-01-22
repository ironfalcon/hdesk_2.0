@extends('layouts.app')

@section('content')
@include('errors')

    <div class="container">
        <h3>Create tasks</h3>

        <div class="row">
            <div class="col-md-12">
               
               {!! Form::open(['route' => ['tasks.store']]) !!}
               <div class="form-group">
                Оборудование
               <input type="text" class="form-control" name="elements" value="{{ old('element')}}">
               <br>
                Аудитория
               <input type="text" class="form-control" name="aud" value="{{ old('aud')}}">
               <br>
                Фамилия
               <input type="text" class="form-control" name="created_user" value="{{ Auth::user()->name }}">
               <br>
                Описание
               <textarea name="description" id="" cols="30" rows="5" class="form-control">
               {{old('description')}}
               </textarea>
               <br>
               <button class="btn btn-success">Submit</button>
               </div>
                </form>
               {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection('content')
