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
            'group_id' => Group::where('name', 'б1-ИФСТ41')->value('id'),
            'permission_id' => 1, 
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9873614549,
            'created_at' => Carbon::now('Europe/Samara'),
            'updated_at' => Carbon::now('Europe/Samara'),
            
        ]);

        DB::table('users')->insert([
            'name' => 'user1',
            'group_id' => Group::where('name', 'б1-ИФСТ41')->value('id'),
            'permission_id' => 1,
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9871614549,
            'created_at' => Carbon::now('Europe/Samara'),
            'updated_at' => Carbon::now('Europe/Samara'),

        ]);

        DB::table('users')->insert([
            'name' => 'user2',
            'group_id' => Group::where('name', 'б1-РКЛМипу41')->value('id'),
            'permission_id' => 1,
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9871618549,
            'created_at' => Carbon::now('Europe/Samara'),
            'updated_at' => Carbon::now('Europe/Samara'),

        ]);

        DB::table('users')->insert([
            'name' => 'user3',
            'group_id' => Group::where('name', 'б1-ИВЧТ41')->value('id'),
            'permission_id' => 1,
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9871635549,
            'created_at' => Carbon::now('Europe/Samara'),
            'updated_at' => Carbon::now('Europe/Samara'),

        ]);

        DB::table('users')->insert([
            'name' => 'user4',
            'group_id' => Group::where('name', 'б1-ИВЧТ41')->value('id'),
            'permission_id' => 1,
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9871448549,
            'created_at' => Carbon::now('Europe/Samara'),
            'updated_at' => Carbon::now('Europe/Samara'),

        ]);

        DB::table('users')->insert([
            'name' => 'sotr',
            'permission_id' => 2,
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9873613448,
            'created_at' => Carbon::now('Europe/Samara'),
            'updated_at' => Carbon::now('Europe/Samara'),
           
        ]);

        DB::table('users')->insert([
            'name' => 'sotr2',
            'permission_id' => 2,
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9873613478,
            'created_at' => Carbon::now('Europe/Samara'),
            'updated_at' => Carbon::now('Europe/Samara'),

        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'permission_id' => 3,
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9874513447,
            'created_at' => Carbon::now('Europe/Samara'),
            'updated_at' => Carbon::now('Europe/Samara'),
        ]);
    }
}
