<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('day')->nullable();
            $table->string('day_num')->nullable();
            $table->string('group_name')->nullable();;
            $table->string('pair_num')->nullable();
            $table->string('pair_time')->nullable();
            $table->string('aud')->nullable();
            $table->string('subj')->nullable();
            $table->string('teacher')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
