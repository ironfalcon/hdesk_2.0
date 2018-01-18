@extends('layouts.app')

@section('content')

<style>
form{
    display:inline;

}
</style>
    <div class="container">
        <h3>Новости факультета</h3>
        @if(Auth::user()->permission()->value('name') == 'admin')
        <a href="{{ route('news.create') }}" class="btn btn-success">Create</a>
        @endif
        <div class="row"> 

            <div class="card-deck">
            @foreach($news as $new)
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="{{$new->photo}}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">{{$new->title}}</h4>
                        <p class="card-text">{{$new->description}}</p>
                        <a href="{{ route('news.show', $new->id) }}" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>

@endsection('content')
