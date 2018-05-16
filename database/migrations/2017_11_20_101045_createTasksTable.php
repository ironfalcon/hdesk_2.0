<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            // $table->increments('id');
            // $table->string('elements');
            // $table->string('aud');
            // $table->string('created_user');
            // $table->string('updated_user')->default('--');
            // $table->timestamps();
            // $table->string('status')->default('Выдано');
            // $table->text('description');

            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->integer('priority_id')->default(2);
            $table->string('create_date');
            $table->string('update_date')->nullable();
            $table->string('close_date')->nullable();
            $table->integer('location_id')->default(1);
            $table->integer('status_id')->default(1);
            $table->integer('assigned_id')->default(1);
            $table->integer('creator_id');
            $table->integer('comments_id')->nullable();
            $table->string('attachments')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
