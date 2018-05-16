<?php

use Illuminate\Database\Seeder;
use App\Priority;
class PriorityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->insert([
            'name' => 'Низкий',
        ]);

        DB::table('priorities')->insert([
            'name' => 'Обычный',
        ]);

        DB::table('priorities')->insert([
            'name' => 'Высокий',
        ]);


    }
}
