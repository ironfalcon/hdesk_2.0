<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Schedule;
use Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        date_default_timezone_set("Europe/Moscow");
        $date = date("d.m");
        $group = Auth::user()->group()->value('name');
        $schedules = Schedule::where('group_name', $group)->get();
        $day1 = Schedule::where('group_name', $group)->where('day' , 'Пн')->get();
        $day2 = Schedule::where('group_name', $group)->where('day' , 'Вт')->get();
        $day3 = Schedule::where('group_name', $group)->where('day' , 'Ср')->get();
        $day4 = Schedule::where('group_name', $group)->where('day' , 'Чт')->get();
        $day5 = Schedule::where('group_name', $group)->where('day' , 'Пт')->get();
        $day6 = Schedule::where('group_name', $group)->where('day' , 'Сб')->get();
        return view('schedule.index1', [/*'schedules' => $schedules, */
            'group' => $group,
            'date' => $date,
            'day1' =>$day1,
            'day2' =>$day2,
            'day3' =>$day3,
            'day4' =>$day4,
            'day5' =>$day5,
            'day6' =>$day6
        ]);
    }

}
