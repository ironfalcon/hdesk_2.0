<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

include_once('pars/curl.php');
include_once('pars/simple_html_dom.php');
class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $html = curl_get('http://rasp.sstu.ru');
        $dom = str_get_html($html);
        $courses = $dom->find('.col-group');
        $flag = 0;
        foreach ($courses as $course) {
            if ($flag < 71)
                $flag++;
            else
                break;

            $name = $course->find('a', 0)->plaintext;

            DB::table('groups')->insert([
                'name' => $name,
                'created_at' => Carbon::now('Europe/Samara'),
                'updated_at' => Carbon::now('Europe/Samara'),
            ]);
        }
    }
}
