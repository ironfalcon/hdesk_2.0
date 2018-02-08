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
    public function message_group()
    {
        return $this->hasMany('App\Message','to_group_id');
    }
}
