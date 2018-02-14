@extends('layouts.app')

@section('content')
@include('errors')

    <div class="container mid-ground">
    <div class="row col-xs-10 col-xs-offset-1">
        <h3>Изменеие записи # {{$claim->id}}</h3>
    </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1" >
               
               {!! Form::open(['route' => ['claims.update', $claim->id], 'method' => 'PUT']) !!}
                
                <div class="form-group">
                    <label for="body">Текст заявки:</label>
                    @if(Auth::user()->name != $claim->author)
                        <textarea  class="form-control" rows="5" name="body" id="body" readonly>{{ $claim->body}}</textarea>
                    @else
                        <textarea  class="form-control" rows="5" name="body" id="body">{{ $claim->body}}</textarea>
                    @endif
                <br>
                    <label for="place">Место размещения:</label>
                    @if(Auth::user()->name != $claim->author)
                        <input type="text" class="form-control" name="place" id="place" value="{{ $claim->place}}" readonly>
                    @else
                        <input type="text" class="form-control" name="place" id="place" value="{{ $claim->place}}" >
                    @endif
                    <br>
                    <label for="date" readonly>Желаемая дата выполнения:</label><br>
                    @if(Auth::user()->name != $claim->author)
                        <input id="date" type="date" name="desired_date" value="{{ $claim->desired_date}}" readonly>
                    @else
                        <input id="date" type="date" name="desired_date" value="{{ $claim->desired_date}}" >
                    @endif
                    <input type="hidden" name="author" value="{{ $claim->author }}">
                <br>
                <br>
                    <label for="status">Статус:</label>
                <br>
                <select name="status" id="status">
                    <option selected value="Не просмотрен">Не просмотрен</option>
                    <option value="В обработке">В обработке</option>
                    <option value="Готово">Готово</option>
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
