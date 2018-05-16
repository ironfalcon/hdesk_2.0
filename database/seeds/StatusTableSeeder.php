<?php

use Illuminate\Database\Seeder;
class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'name' => 'Не назначен',
        ]);

        DB::table('statuses')->insert([
            'name' => 'Открыт',
        ]);

        DB::table('statuses')->insert([
            'name' => 'Отказано',
        ]);

        DB::table('statuses')->insert([
            'name' => 'Закрыт',
        ]);
    }
}
