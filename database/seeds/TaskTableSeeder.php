<?php

use Illuminate\Database\Seeder;
use App\Task;
use Carbon\Carbon;
class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
        'title' => 'не подключается wi-fi',
        'description' => 'описание проблемы и подробности',
            'priority_id' => 1,
            'create_date' => Carbon::now('Europe/Samara'),
            'update_date' => '',
            'close_date' => '',
            'location_id' => 1,
            'status_id' => 1,
            'assigned_id' => 1,
            'creator_id' => 2,
            'comments_id' => 1,
            'attachments' => '',

        ]);

        DB::table('tasks')->insert([
            'title' => 'не работает почта',
            'description' => 'описание проблемы и подробности о то что не работает почта',
            'priority_id' => 2,
            'create_date' => Carbon::now('Europe/Samara'),
            'update_date' => '',
            'close_date' => '',
            'location_id' => 2,
            'status_id' => 2,
            'assigned_id' => 2,
            'creator_id' => 3,
            'comments_id' => 1,
            'attachments' => '',

        ]);

        DB::table('tasks')->insert([
            'title' => 'закончился картридж',
            'description' => 'описание проблемы и подробности о то что закончился картридж',
            'priority_id' => 3,
            'create_date' => Carbon::now('Europe/Samara'),
            'update_date' => Carbon::now('Europe/Samara'),
            'close_date' => Carbon::now('Europe/Samara'),
            'location_id' => 3,
            'status_id' => 3,
            'assigned_id' => 1,
            'creator_id' => 2,
            'comments_id' => 2,
            'attachments' => '',

        ]);


    }
}
