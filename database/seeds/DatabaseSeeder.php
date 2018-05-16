<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        //$this->call(GroupTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(UserTableSeeder::class);
        //$this->call(ClaimTableSeeder::class);
        //$this->call(NewsTableSeeder::class);
        $this->call(TaskTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(LocationTableSeeder::class);
        $this->call(PriorityTableSeeder::class);
        $this->call(StatusTableSeeder::class);

    }
}
