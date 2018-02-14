@extends('layouts.app')

@section('content')
@include('errors')

    <div class="container mid-ground">
        <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
        <h3>Изменеие записи # {{$task->id}}</h3>
        </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
               
               {!! Form::open(['route' => ['tasks.update', $task->id], 'method' => 'PUT']) !!}
                
                <div class="form-group">
                    <label for="elements">Оборудование:</label>
                    <input type="text" class="form-control" id="elements" name="elements" value="{{ $task->elements}}" >
                <br>
                    <label for="aud">Аудитория:</label>
                    <input type="text" class="form-control" id="aud" name="aud" value="{{ $task->aud}}">

                    <input type="hidden" class="form-control" name="updated_user" value="{{ Auth::user()->name}}">
                <br>
                    <label for="description">Описание:</label>
                <textarea name="description" id="description" rows="5" class="form-control">{{ $task->description}}</textarea>
                <br>
                    <label for="status">Статус:</label>
                <br>
                <select name="status" id="status">
                    <option selected value="Выдано">Выдано</option>
                    <option value="Забрали">Забрали</option>
                </select>
                <br>
                <br>
                <button class="btn btn-success">Подтвердить</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection('content')