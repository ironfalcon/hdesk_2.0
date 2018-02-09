<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{

    /**
    * Связанная с моделью таблица.
    *
    * @var string
    */
    protected $table = 'informations';

    //поля для потокового заполнения
    protected $fillable = [
        'title', 'body', 'description', 'photo'
    ];
}
