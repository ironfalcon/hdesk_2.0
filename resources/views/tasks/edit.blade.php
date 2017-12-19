@extends('layouts.app')

@section('content')
@include('errors')

    <div class="container">
        <h3>Изменеие записи # {{$task->id}}</h3>

        <div class="row">
            <div class="col-md-12">
               
               {!! Form::open(['route' => ['tasks.update', $task->id], 'method' => 'PUT']) !!}
                
                <div class="form-group">
                Оборудование
               <input type="text" class="form-control" name="elements" value="{{ $task->elements}}">
               <br>
                Аудитория
               <input type="text" class="form-control" name="aud" value="{{ $task->aud}}">
               <br>
                Фамилия
               <input type="text" class="form-control" name="updated_user" value="{{ Auth::user()->name}}">
               <br>
                Описание
               <textarea name="description" id="" cols="30" rows="5" class="form-control">
               {{ $task->description}}
               </textarea>
                <br>
                Статус
                <br>
                <select name="status">
                    <option selected value="Выдано">Выдано</option>
                    <option value="Забрали">Забрали</option>
                </select>
               <br>
               <br>
               <button class="btn btn-success">Submit</button>
               </div>

               {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection('content')