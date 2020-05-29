<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'school',
        'graduation_year',
        'citizenship',
        'city',
        'address',
    ];
}
