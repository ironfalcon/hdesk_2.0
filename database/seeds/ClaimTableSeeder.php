<?php

use App\User;
use Illuminate\Database\Seeder;

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
            'desired_date' => date("Y-m-d H:i:s"),
            'place' => str_random(3),
            'status' => 'Не просмотрен',

        ]);

        DB::table('claims')->insert([
            'Body' => str_random(60),
            'author' => User::where('id', 3)->value('name'),
            'desired_date' => date("Y-m-d H:i:s"),
            'place' => str_random(3),
            'status' => 'Не просмотрен',

        ]);
    }
}
