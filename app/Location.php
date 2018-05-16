<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //связь локации и таска
    public function tasks()
    {
      return $this->hasMany('App\Task', 'id');
    }
}
