@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Расписание группы {{ $group }}</h3><br>
        <div class="row col-xs-12">
                <div style="float: left; width: 175px">
                    <div style="text-align: center; margin-top: 10px;">Понедельник</div>
                @foreach($day1 as $day)
                @if($day1[0]->day_num != $day->day_num)
                    @break
                @else
                    <div>
                        <div class="schedule-card-today">
                            @if((int)$date === (int)$day->day_num)
                            <div class="schedule-head-today">
                            @else
                            <div class="schedule-head">
                            @endif
                                {{--{{$schedule->day}}--}} {{ $day->day_num }} {{ $day->pair_time }} Пара №{{ $day->pair_num }}
                            </div>
                            <div class="schedule-content-today">
                                <span>Ауд. №{{ $day->aud }} </span><br>
                                <span>{{ $day->subj }}</span><br>
                                <span>{{ $day->teacher }}</span><br>
                            </div>
                        </div>
                    </div>
                @endif
                    @endforeach
                </div>

            <div style="float: left; width: 175px">
                <div style="text-align: center; margin-top: 10px;">Вторник</div>
                @foreach($day2 as $day)
                    @if($day2[0]->day_num != $day->day_num)
                        @break
                    @else
                    <div>
                        <div class="schedule-card-today">
                            @if((int)$date === (int)$day->day_num)
                            <div class="schedule-head-today">
                            @else
                            <div class="schedule-head">
                            @endif
                                {{--{{$schedule->day}}--}} {{ $day->day_num }} {{ $day->pair_time }} Пара №{{ $day->pair_num }}
                            </div>
                            <div class="schedule-content-today">
                                <span>Ауд. №{{ $day->aud }} </span><br>
                                <span>{{ $day->subj }}</span><br>
                                <span>{{ $day->teacher }}</span><br>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

            <div style="float: left; width: 175px">
                <div style="text-align: center; margin-top: 10px;">Среда</div>
                @foreach($day3 as $day)
                    @if($day3[0]->day_num != $day->day_num)
                        @break
                    @else
                        <div>
                            <div class="schedule-card-today">
                                @if((int)$date === (int)$day->day_num)
                                <div class="schedule-head-today">
                                @else
                                <div class="schedule-head">
                                @endif
                                    {{--{{$schedule->day}}--}} {{ $day->day_num }} {{ $day->pair_time }} Пара №{{ $day->pair_num }}
                                </div>
                                <div class="schedule-content-today">
                                    <span>Ауд. №{{ $day->aud }} </span><br>
                                    <span>{{ $day->subj }}</span><br>
                                    <span>{{ $day->teacher }}</span><br>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div style="float: left; width: 175px">
                <div style="text-align: center; margin-top: 10px;">Четверг</div>
                @foreach($day4 as $day)
                    @if($day4[0]->day_num != $day->day_num)
                        @break
                    @else
                        <div>
                            <div class="schedule-card-today">
                            @if((int)$date === (int)$day->day_num)
                            <div class="schedule-head-today">
                            @else
                            <div class="schedule-head">
                            @endif
                                    {{--{{$schedule->day}}--}} {{ $day->day_num }} {{ $day->pair_time }} Пара №{{ $day->pair_num }}
                                </div>
                                <div class="schedule-content-today">
                                    <span>Ауд. №{{ $day->aud }} </span><br>
                                    <span>{{ $day->subj }}</span><br>
                                    <span>{{ $day->teacher }}</span><br>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div style="float: left; width: 175px">
                <div style="text-align: center; margin-top: 10px;">Пятница</div>
                @foreach($day5 as $day)
                    @if($day5[0]->day_num != $day->day_num)
                        @break
                    @else
                        <div>
                            <div class="schedule-card-today">
                                @if((int)$date === (int)$day->day_num)
                                <div class="schedule-head-today">
                                @else
                                <div class="schedule-head">
                                @endif
                                    {{--{{$schedule->day}}--}} {{ $day->day_num }} {{ $day->pair_time }} Пара №{{ $day->pair_num }}
                                </div>
                                <div class="schedule-content-today">
                                    <span>Ауд. №{{ $day->aud }} </span><br>
                                    <span>{{ $day->subj }}</span><br>
                                    <span>{{ $day->teacher }}</span><br>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div style="float: left; width: 175px">
                <div style="text-align: center; margin-top: 10px;">Суббота</div>
                @foreach($day6 as $day)
                    @if($day6[0]->day_num != $day->day_num)
                        @break
                    @else
                        <div>
                            <div class="schedule-card-today">
                                @if((int)$date === (int)$day->day_num)
                                <div class="schedule-head-today">
                                @else
                                <div class="schedule-head">
                                @endif
                                    {{--{{$schedule->day}}--}} {{ $day->day_num }} {{ $day->pair_time }} Пара №{{ $day->pair_num }}
                                </div>
                                <div class="schedule-content-today">
                                    <span>Ауд. №{{ $day->aud }} </span><br>
                                    <span>{{ $day->subj }}</span><br>
                                    <span>{{ $day->teacher }}</span><br>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>


        </div>
    </div>

@endsection('content')
