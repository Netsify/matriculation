<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdvertRequest;
use App\Models\Advert;

class AdvertController extends Controller
{
    /**
     * @var Advert
     */
    private $advert;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Advert $advert)
    {
        $this->advert = $advert;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $adverts = Advert::all();

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
        $this->advert->create([
            'title' => $request->get('title'),
            'body' => $request->get('body')
        ])->save();

        return redirect('/adverts')->with('message', config('app.advert_added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\View\View
     */
    public function show(Advert $advert)
    {
        return view('adverts.show', compact('advert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\View\View
     */
    public function edit(Advert $advert)
    {
        return view('adverts.edit', compact('advert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AdvertRequest  $request
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdvertRequest $request, Advert $advert)
    {
        $advert->title = $request->get('title');
        $advert->body = $request->get('body');

        $advert->save();

        return redirect('/adverts')->with('message', config('app.advert_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Advert $advert
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Advert $advert)
    {
        $advert->delete();

        return redirect('/adverts')->with('message', config('app.advert_deleted'));
    }
}
