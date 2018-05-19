<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Task;

class Comment extends Model
{

  //связь комента и пользователя
  public function user($id)
  {
      return User::find($id);
    //return $this->belongsTo('App\User', 'id');
  }

  //связь комента и таска
  public function task()
  {
    return $this->belongsTo('App\Task', 'id');
  }

}
