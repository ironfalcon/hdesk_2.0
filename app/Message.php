<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Group;
class Message extends Model
{
    protected $fillable = [
        'body', 'from_user_id', 'to_user_id', 'unread', 'date_send', 'to_group_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }

    public function fromUser()
    {
        $from = $this->value('from_user_id');
        $user = User::where('id', $from)->value('name');
        return $user;
    }

    public function group()
    {
        return $this->belongsTo('App\Group', 'id');
    }
}
