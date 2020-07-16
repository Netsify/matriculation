<?php

namespace App\Models;

use App\Models\Advert;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function adverts()
    {
        return $this->belongsToMany(Advert::class);
    }
}
