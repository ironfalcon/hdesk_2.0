<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Priority;
use App\Location;
use App\Comment;
use App\Status;
use App\User;


class Task extends Model
{
    protected $fillable = ['title', 'description', 'priority_id','create_date',
        'update_date', 'close_date', 'location_id', 'status_id', 'assigned_id',
        'creator_id', 'comments_id', 'attachments'];

    //связь таска и приоритета
    public function priority($id)
    {
        return  Priority::find($id);
//      return $this->belongsTo('App\Priority', 'id');
    }

    //связь таска и статуса
    public function status()
    {
      return $this->belongsTo('App\Status', 'id');
    }

    //связь таска и локации пользователя
    public function location($id)
    {
        return Location::find($id);
      //return $this->belongsTo('App\Location', 'id');
    }

    //связь таска и коментариев
    public function comments($id)
    {
        return Comment::where('comment_to_id', $id);
      //return $this->hasMany('App\Comment', 'comment_to_id');
    }

    //связь таска и пользователей
    public function user($id)
    {
//      return $this->belongsTo('App\User', 'id');
     return  User::find($id);
    }


}

