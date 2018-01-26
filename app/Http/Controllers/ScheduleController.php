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
        return view('schedule.index', ['schedules' => $schedules, 'group' => $group, 'date' => $date]);
    }

}
