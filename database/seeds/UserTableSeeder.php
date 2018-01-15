<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Group;


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
            'group_id' => Group::where('name', 'б1ИФСТ-41')->value('id'),
            'permission_id' => 1, 
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9873614549,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            
        ]);

        DB::table('users')->insert([
            'name' => 'sotr',
            'permission_id' => 2,
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9873613448,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
           
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'permission_id' => 3,
            'email' => str_random(3).'@gmail.com',
            'password' => bcrypt(123456),
            'phone' => 9874513447,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
