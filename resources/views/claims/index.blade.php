@extends('layouts.app')

@section('content')

<style>
.cd{
    display:inline;
}
</style>
    <div class="container mid-ground">
    <div class="row col-xs-10 col-xs-offset-1">
        @if(Auth::user()->permission()->value('name') == 'sotr')
            <h3 style="display: inline;">Ваши отправленные заявки</h3>
            <a href="{{ route('claims.create') }}" class="btn btn-success" style="float:right;">Создать</a>
        @else
            <h3 style="display: inline;">Заявки пользователей</h3>
            <a href="{{ route('claims.create') }}" class="btn btn-success" style="float:right;">Создать</a>
        @endif
    </div>
        <div class="row">  
            <div class="col-xs-10 col-xs-offset-1" >
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Автор</td>
                            <td>Комната</td>
                            <td>Статус</td>
                        </tr>
                    </thead>
                    <tbody style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);margin-top: 10px;">
                    @foreach($claims as $claim)
                    @if($claim->status == 'Не просмотрен')
                        <tr class="bg-danger">
                    @elseif($claim->status == 'В обработке')
                        <tr class="bg-warning">
                    @else
                        <tr class="bg-success">
                    @endif
                            <td class="col-xs-1">
                                {{$claim->id}}
                            </td>

                            <td class="col-xs-1">
                                <a href="{{ route('claims.show', $claim->id) }}">
                                {{$claim->author}}
                                </a>
                            </td>

                            <td class="col-xs-1">
                                {{$claim->place}}
                            </td>

                            <td class="col-xs-1">
                                {{$claim->status}}
                            </td>

                            @if(Auth::user()->permission()->value('name') == 'admin')
                            <td class="col-xs-2">
                                <a href="{{ route('claims.show', $claim->id) }}">
                                <button class="btn btn-success">Просмотр</button>
                                </a>
                    
                                <a href="{{ route('claims.edit', $claim->id) }}">
                                <button class="btn btn-warning">Изменить</button>
                                </a>


                                
                                {!! Form::open(['method' => 'DELETE', 'route' => ['claims.destroy', $claim->id] ])!!}
                                <button class="btn btn-danger cd" onclick="return confirm('Вы уверены?')">Удалить</button>
                                {!! Form::close() !!}
                                
                            </td>
                            @elseif(Auth::user()->permission()->value('name') == 'sotr')
                                <td class="col-xs-2">
                                    <a href="{{ route('claims.show', $claim->id) }}">
                                        <button class="btn btn-success">Просмотр</button>
                                    </a>

                                    {!! Form::open(['method' => 'DELETE', 'route' => ['claims.destroy', $claim->id] ])!!}
                                    <button class="btn btn-danger cd" onclick="return confirm('Вы уверены?')">Удалить</button>
                                    {!! Form::close() !!}

                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $claims->links() }}
            </div>
        </div>
    </div>

@endsection('content')
