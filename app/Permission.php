<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Permission extends Model
{
    
    //Relationship Permission => Users
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
