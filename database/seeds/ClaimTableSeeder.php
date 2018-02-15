<?php

use App\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ClaimTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('claims')->insert([
            'Body' => str_random(60),
            'author' => User::where('id', 2)->value('name'),
            'desired_date' => Carbon::createFromFormat('Y-m-d H:i:s', '2018-02-10 14:30:13')->toDateTimeString(),
            'place' => str_random(3),
            'status' => 'Не просмотрен',

        ]);

        DB::table('claims')->insert([
            'Body' => str_random(60),
            'author' => User::where('id', 3)->value('name'),
            'desired_date' => Carbon::createFromFormat('Y-m-d H:i:s', '2018-02-10 14:30:13')->toDateTimeString(),
            'place' => str_random(3),
            'status' => 'Не просмотрен',

        ]);
    }
}
