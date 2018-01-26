@extends('layouts.app')

@section('content')


    <div class="container">
        <h3>Расписание группы {{ $group }}</h3>

        <br>
        <div class="row col-xs-12">


        @foreach($schedules as $schedule)
            @if((int)$date === (int)$schedule->day_num)
                <div class="schedule-card-today">
                <div class="schedule-head-today">
                    {{$schedule->day}} {{ $schedule->day_num }} Пара №{{ $schedule->pair_num }}
                </div>
                <div class="schedule-content-today">
                    <span>  Время: {{ $schedule->pair_time }} </span><br>
                    <span>Аудитория №{{ $schedule->aud }} </span><br>
                    <span>Предмет: {{ $schedule->subj }}</span><br>
                    <span>{{ $schedule->teacher }}</span><br>
                </div>
                </div>
            @else
            <div class="schedule-card">
                <div class="schedule-head">
                    {{$schedule->day}} {{ $schedule->day_num }} Пара №{{ $schedule->pair_num }}
                </div>
                <div class="schedule-content">
                    <span>  Время: {{ $schedule->pair_time }} </span><br>
                    <span>Аудитория №{{ $schedule->aud }} </span><br>
                    <span>Предмет: {{ $schedule->subj }}</span><br>
                    <span>{{ $schedule->teacher }}</span><br>
                </div>
            </div>
            @endif
        @endforeach


        </div>
    </div>

@endsection('content')
