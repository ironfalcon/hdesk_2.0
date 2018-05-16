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
        'name', 'email', 'password', 'phone', 'avatar', 'group_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // связь пользователь группа
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    // связь пользователь права
    public function permission()
    {
    return $this->belongsTo('App\Permission');
    }

    //связь пользователь коменты
    public function comments()
    {
      return $this->hasMany('App\Comment', 'comment_to_id');
    }

    //Relationships User =>Claims
    // public function Claim()
    // {
    //     return $this->hasMany('App\Claim');
    // }

    // public function message_from()
    // {
    //     return $this->hasMany('App\Message','from_user_id');
    // }
}
