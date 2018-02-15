<?php

use Illuminate\Database\Seeder;
use App\User;
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
            'elements' => str_random(5),
            'created_user' => User::where('id', 2)->value('name'),
            'aud' => str_random(3),
            'updated_user' => '--',
            'status' => 'Выдано',
            'description' => str_random(5),
            'created_at' => Carbon::now('Europe/Samara'),

        ]);

        DB::table('tasks')->insert([
            'elements' => str_random(5),
            'created_user' => User::where('id', 3)->value('name'),
            'aud' => str_random(3),
            'updated_user' => User::where('id', 8)->value('name'),
            'status' => 'Забрали',
            'description' => str_random(5),
            'created_at' => Carbon::now('Europe/Samara'),

        ]);
    }
}
