<?php

namespace App\Http\Controllers;

use App\Repositories\AdvertRepository;
use App\Http\Requests\AdvertRequest;
use App\Repositories\CommentRepository;

class AdvertController extends Controller
{
    /**
     * @var AdvertRepository
     */
    private $advertRepository;

    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * Create a new controller instance.
     *
     * @param AdvertRepository $advertRepository
     * @param CommentRepository $commentRepository
     */
    public function __construct(AdvertRepository $advertRepository, CommentRepository $commentRepository)
    {
        $this->middleware('auth');
        $this->middleware('advert');
        $this->advertRepository = $advertRepository;
        $this->commentRepository = $commentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $adverts = $this->advertRepository->getAllAdverts();

        return view('index', compact('adverts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('adverts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AdvertRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdvertRequest $request)
    {
        $this->advertRepository->createAdvert($request->all());

        return redirect('/')->with('message', config('app.advert_added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $advert = $this->advertRepository->getById($id);
        $comments = $this->commentRepository->getAdvertComments($id);

        return view('adverts.show', compact('advert', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $advert = $this->advertRepository->getById($id);

        return view('adverts.edit', compact('advert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AdvertRequest  $request
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdvertRequest $request, $id)
    {
        $advert = $this->advertRepository->getById($id);

        $this->advertRepository->updateAdvert($request->all(), $advert);

        return redirect('/')->with('message', config('app.advert_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->advertRepository->remove($id);

        return redirect('/')->with('message', config('app.advert_deleted'));
    }
}
