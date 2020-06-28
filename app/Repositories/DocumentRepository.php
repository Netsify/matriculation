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
    public function createDocument($key, $file)
    {
        /**
         * get input-file's name last char as document type id
         */
        $typeId = $key[-1];

        /**
         * get input-file's first chars as stored directory name
         */
        $directoryLength = strpos($key, $typeId);
        $directory = substr($key, 0, $directoryLength);

        $this->model->create([
            'user_id' => \Auth::id(),
            'path' => $file->store($directory, 'public'),
            'name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
            'extension' => $file->extension(),
            'document_type_id' => $typeId
        ])->save();
    }

    //get specific document by it's type id
    public function getDocument($typeId)
    {
        return $this->model
            ->where('document_type_id', $typeId)
            ->where('user_id', \Auth::id())
            ->first(['name', 'extension', 'created_at']);
    }
}
