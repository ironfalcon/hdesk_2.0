<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user',
            'group_id' => 1,
            'permission_id' => 1,
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9873614549,
        ]);

        DB::table('users')->insert([
            'name' => 'sotr',
            'permission_id' => 2,
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9873613448,
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'permission_id' => 3,
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9874513447,
        ]);
    }
}
