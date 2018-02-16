@extends('layouts.app')

@section('content')
@include('errors')

    <div class="container mid-ground">
        <div class="row col-xs-10 col-xs-offset-1">
        <h3>Создание заявки</h3>
        </div>
        <div class="row col-xs-10 col-xs-offset-1" >
               
               {!! Form::open(['route' => ['claims.store']]) !!}
               <div class="form-group">
                   <label for="body">Текст заявки:</label>
                   <textarea class="form-control" rows="5" name="body" id="body">{{ old('body')}}</textarea>
               <br>
                   <label for="place">Место размещения:</label>
                   <input type="text" class="form-control" name="place" id="place" value="{{ old('place')}}">
               <br>
                   <label for="date">Желаемая дата выполнения:</label><br>
                   <input id="date" type="datetime-local" name="desired_date">
                   <input type="hidden" name="author" value="{{ Auth::user()->name }}">
               <br>
               <br>
               <button class="btn btn-success">Отправить</button>
               </div>
                </form>
               {!! Form::close() !!}
        </div>
    </div>

@endsection('content')

