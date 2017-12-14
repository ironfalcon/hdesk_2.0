<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['elements', 'aud', 'created_user','description', 'updated_user', 'status'];
}
