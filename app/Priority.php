<?php

namespace App;
use App\Task;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    //связь приоритета и таска
    public function tasks()
    {
        return $this->hasMany('App\Task', 'id');
    }
}
