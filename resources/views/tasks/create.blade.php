@extends('layouts.app')

@section('content')
@include('errors')

    <div class="container mid-ground" style="  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>Выдаваемое оборудование</h3>
            </div>
        </div>
        <div class="row col-md-8 col-md-offset-2">
               {!! Form::open(['route' => ['tasks.store'], 'files' => true]) !!}
               <div class="form-group">
                   <label for="title">Заголовок:</label>
                   <input type="text" class="form-control" id="title" name="title" value="{{ old('title')}}">
               <br>
                   <label for="description">Описание:</label>
                   <textarea name="description" id="description" rows="5" class="form-control">{{ old('description')}}</textarea>
               <br>
                   <label for="priority">Приоритет:</label>
                   <br>
                   <select class="form-control" id="priority_id" name="priority_id">
                       @foreach($priorities as $priority)
                           <option value="{{$priority->id}}">{{$priority->name}}</option>
                       @endforeach
                   </select>
               <br>
                   <label for="location">Расположение:</label>
                   <select class="form-control" id="location_id" name="location_id">
                       @foreach($locations as $location)
                           <option value="{{$location->id}}">{{$location->name}}</option>
                       @endforeach
                   </select>
               <br>
                   <input type="hidden" class="form-control" name="creator_id" value="{{ Auth::user()->id }}">

                   <label for="photo">Изображение:</label>
                   <input type="file" class="btn btn-success" id="photo" name="photo" value="{{ old('photo')}}">
               <br>
               <button class="btn btn-success">Подтвердить</button>
               </div>
               {!! Form::close() !!}

        </div>
    </div>

@endsection('content')
