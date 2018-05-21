<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskLog extends Model
{
    //
    protected $fillable = ['task_id', 'user_id', 'action',];
}
