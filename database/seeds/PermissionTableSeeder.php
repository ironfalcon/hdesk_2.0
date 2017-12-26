<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permissions')->insert([
            'name' => 'user',
        ]);

        DB::table('permissions')->insert([
            'name' => 'sotr',
        ]);

        DB::table('permissions')->insert([
            'name' => 'admin',
        ]);
    }
}
