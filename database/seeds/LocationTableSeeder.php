<?php

use Illuminate\Database\Seeder;
class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'name' => 'Не назначено',
        ]);

        DB::table('locations')->insert([
            'name' => '417',
        ]);

        DB::table('locations')->insert([
            'name' => '432',
        ]);

        DB::table('locations')->insert([
            'name' => '402',
        ]);

        DB::table('locations')->insert([
            'name' => '424',
        ]);

        DB::table('locations')->insert([
            'name' => '427',
        ]);



    }
}
