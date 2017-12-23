<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class group extends Model
{
    
    //Relationships Group => Users
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
