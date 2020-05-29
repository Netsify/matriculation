<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'body',
    ];
}