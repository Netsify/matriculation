<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'path',
        'document_type_id',
    ];

    /**
     * Many to One relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }
}
