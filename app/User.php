<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permission;
use App\Group;
use App\Claim;
use App\Message;



class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relationships User => Group
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    // Relationships User => Permission
    public function permission()
    {
    return $this->belongsTo('App\Permission');
    }

    //Relationships User =>Claims
    public function Claim()
    {
        return $this->hasMany('App\Claim');
    }

    public function message_from()
    {
        return $this->hasMany('App\Message','from_user_id');
    }

    public function message_to()
    {
        return $this->hasMany('App\Message','to_user_id');
    }
}