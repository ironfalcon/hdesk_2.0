<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('groups')->insert([
            'name' => 'б1ИФСТ-41',
            'url' => 'http://rasp.sstu.ru/group/42',
        ]);

        DB::table('groups')->insert([
            'name' => 'б1ИВЧТ-41',
            'url' => 'http://rasp.sstu.ru/group/22',
        ]);
    }
}
