<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'text' => 'Тестовый комментарий',
            'user_id' => 2,
            'comment_to_id' => 1,
            'post_date' => Carbon::now('Europe/Samara'),
        ]);

        DB::table('comments')->insert([
            'text' => 'Сделайте как можно скорее',
            'user_id' => 3,
            'comment_to_id' => 1,
            'post_date' => Carbon::now('Europe/Samara'),
        ]);

        DB::table('comments')->insert([
            'text' => 'Уточняем информацию',
            'user_id' => 2,
            'comment_to_id' => 2,
            'post_date' => Carbon::now('Europe/Samara'),
        ]);

        DB::table('comments')->insert([
            'text' => 'Еще один коммент',
            'user_id' => 3,
            'comment_to_id' => 3,
            'post_date' => Carbon::now('Europe/Samara'),
        ]);

        DB::table('comments')->insert([
            'text' => 'Отказано по причине политики безопасности',
            'user_id' => 2,
            'comment_to_id' => 3,
            'post_date' => Carbon::now('Europe/Samara'),
        ]);
    }
}
