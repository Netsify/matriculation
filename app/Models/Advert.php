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
     * Get the adverts's body first sentence.
     *
     * @param  string  $text
     * @return string
     */
    public function getBodySentenceAttribute()
    {
        return explode('.', $this->body)[0] . '...';
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
