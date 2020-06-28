<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\DocumentType;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $documentTypes = DocumentType::all();

        $document = $this->documentRepository;

        return view('documents.index', compact('documentTypes', 'document'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DocumentRequest $request)
    {
        /** $key - input-file's name which is document type slug with id
         * $value - uploaded file's information
         */

        dd($request->file()->extension());

        foreach ($request->file() as $key => $value) {
            $this->documentRepository->createDocument($key, $value);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $documents = $this->documentRepository->getById($id);

//        dd($this->documentRepository->getById($id));

        return view('documents.show', compact('documents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
