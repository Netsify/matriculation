<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Repositories\DocumentRepository;

class DocumentController extends Controller
{
    /**
     * @var DocumentRepository
     */
    private $documentRepository;

    /**
     * Create a new controller instance.
     *
     * @param DocumentRepository $documentRepository
     */
    public function __construct(DocumentRepository $documentRepository)
    {
        $this->middleware('auth');
        $this->documentRepository = $documentRepository;
    }

    public function index()
    {
        return view('document');
    }

    public function upload(DocumentRequest $request)
    {
        foreach ($request->file() as $key => $file)
            $this->documentRepository->createDocument($key, $value);

        return view('document');
    }

    public function usefulMethods(DocumentRequest $request)
    {
        $file = $request->file('document');

        //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';

        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';

        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';

        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';

        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();
        echo '<br>';

        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        echo $destinationPath;
    }
}
