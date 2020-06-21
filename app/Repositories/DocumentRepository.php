<?php

namespace App\Repositories;

use App\Models\Document;
use phpDocumentor\Reflection\File;

class DocumentRepository extends BaseRepository
{
    /**
     * Create a new DocumentRepository instance.
     *
     * @param  App\Models\Document $document
     * @return void
     */
    public function __construct(Document $document)
    {
        $this->model = $document;
    }

    /**
     * Create a document.
     *
     * @param string $key
     * @param File $value
     * @return void
     */
    public function createDocument($directory, $file)
    {
        $this->model->create([
            'user_id' => \Auth::id(),
            'document_type_id' => 1,
            'hash_name' => pathinfo($file->hashName(), PATHINFO_FILENAME),
            'name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
            'path' => $file->store($directory, 'public'),
        ])->save();
    }
}
