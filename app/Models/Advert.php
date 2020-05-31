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

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
//    protected $dates = ['updated_at'];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
//    protected $dateFormat = 'd-m-Y';
//
//    public function getUpdatedAtAttribute($date)
//    {
//        return $date->format('m-d');
//    }

    /**
     * Get the adverts's body first sentence.
     *
     * @param  string  $body
     * @return string
     */
    public function getBodyAttribute($body)
    {
        return preg_replace('/(.*?[?!.](?=\s|$)).*/', '\\1', $body);
    }
}
