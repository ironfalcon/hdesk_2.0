@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Главная</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->permission()->value('name') == 'user')
                        <a href="{{ route('tasks.index') }}">
                            <div class="btn btn-success">Новости</div>
                        </a>
                    @elseif(Auth::user()->permission()->value('name') == 'sotr')
                        <a href="{{ route('tasks.index') }}">
                            <div class="btn btn-success">Заявки</div>
                        </a>
                    @elseif(Auth::user()->permission()->value('name') == 'admin')
                        <a href="{{ route('tasks.index') }}">
                            <div class="btn btn-success">Выдача оборудования</div>
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
