@extends('layouts.app')

@section('content')
@include('errors')

    <div class="container">
        <h3>Создание оповещения</h3>
        <div class="row col-xs-10 col-xs-offset-1">
               
               {!! Form::open(['route' => ['messages.store']]) !!}
               <div class="form-group">
                   <label for="body">Новое сообщение:</label>
                   <textarea class="form-control" rows="5" name="body" id="body">{{ old('body')}}</textarea>
               <br>
                   <label for="group">Получатель:</label>
                   <select name="to_user_id" id="group">
                       @foreach($groups as $group)
                           <option selected value="{{ $group->id }}">{{ $group->name }}</option>
                       @endforeach
                   </select>
                   <input type="hidden" name="from_user_id" value="{{ Auth::user()->id }}">
               <br>
               <br>
               <button class="btn btn-success">Отправить</button>
               </div>
                </form>
               {!! Form::close() !!}
        </div>
    </div>

@endsection('content')

