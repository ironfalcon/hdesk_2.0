<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $fillable = ['body', 'author', 'desired_date', 'place', 'status'];

    // Relationships Claim => User
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
