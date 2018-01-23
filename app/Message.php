<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\User;
class Message extends Model
{
    protected $fillable = [
        'body', 'from_user_id', 'to_user_id', 'unread', 'date_send'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }
}
