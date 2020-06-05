<?php

namespace App\Repositories;

use App\Models\Advert;

class AdvertRepository extends BaseRepository
{
    /**
     * Create a new AdvertRepository instance.
     *
     * @param  App\Models\Advert $advert
     * @return void
     */
    public function __construct(Advert $advert)
    {
        $this->model = $advert;
    }

    /**
     * Get all adverts.
     *
     * @return string
     */
    public function getAllAdverts()
    {
        return $this->model->all();
    }

    /**
     * Create an advert.
     *
     * @param array $inputs
     * @return void
     */
    public function createAdvert($inputs)
    {
        $this->model->create([
            'title' => $inputs['title'],
            'body' => $inputs['body']
        ])->save();
    }

    /**
     * Update an advert.
     *
     * @param array $inputs
     * @return void
     */
    public function updateAdvert($inputs, $advert)
    {
        $advert->title = $inputs['title'];
        $advert->body = $inputs['body'];
        $advert->save();
    }
}
