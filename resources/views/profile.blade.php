@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
        <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius: 50%; margin-right: 25px;">
            <h2>Профиль пользователя: {{ $user->name }}</h2>
            <form enctype="multipart/form-data" action="profile" method="POST">
                {{ csrf_field() }}
                <lable>Обновить фото профиля</lable>
                <input type="file" name="avatar">
                <button type="submit" class="pull-right btn btn-sm btn-primary">Загрузить</button>
            </form>
            <h3>Ваш статус: {{ $user->permission->name}}</h3>
        </div>
    </div>
</div>
@endsection
