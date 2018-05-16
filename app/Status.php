<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //связь статуса и тасков
    public function tasks()
    {
      return $this->hasMany('App\Task', 'id');
    }
}
