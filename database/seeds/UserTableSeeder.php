<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Group;
use Carbon\Carbon;


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
            'name' => 'Не назначен',
            'permission_id' => 1, 
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9873614549,
            'created_at' => Carbon::now('Europe/Samara'),
            'updated_at' => Carbon::now('Europe/Samara'),
            
        ]);

        DB::table('users')->insert([
            'name' => 'Иванов_ИИ',
            'permission_id' => 1,
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9871614549,
            'created_at' => Carbon::now('Europe/Samara'),
            'updated_at' => Carbon::now('Europe/Samara'),

        ]);

        DB::table('users')->insert([
            'name' => 'Петров_ПП',
            'permission_id' => 1,
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9871618549,
            'created_at' => Carbon::now('Europe/Samara'),
            'updated_at' => Carbon::now('Europe/Samara'),

        ]);

        DB::table('users')->insert([
            'name' => 'Семенов_СС',
            'permission_id' => 1,
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9871635549,
            'created_at' => Carbon::now('Europe/Samara'),
            'updated_at' => Carbon::now('Europe/Samara'),

        ]);

        DB::table('users')->insert([
            'name' => 'Бирюков_СВ',
            'permission_id' => 1,
            'email' => 'ironfalcon@yandex.ru',
            'password' => bcrypt(123456),
            'phone' => 9871448549,
            'created_at' => Carbon::now('Europe/Samara'),
            'updated_at' => Carbon::now('Europe/Samara'),

        ]);

        DB::table('users')->insert([
            'name' => 'Админ_1',
            'permission_id' => 3,
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9874513447,
            'created_at' => Carbon::now('Europe/Samara'),
            'updated_at' => Carbon::now('Europe/Samara'),
        ]);

        DB::table('users')->insert([
            'name' => 'Админ_2',
            'permission_id' => 3,
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9874513441,
            'created_at' => Carbon::now('Europe/Samara'),
            'updated_at' => Carbon::now('Europe/Samara'),
        ]);

        DB::table('users')->insert([
            'name' => 'Админ_3',
            'permission_id' => 3,
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9874513543,
            'created_at' => Carbon::now('Europe/Samara'),
            'updated_at' => Carbon::now('Europe/Samara'),
        ]);
    }
}
