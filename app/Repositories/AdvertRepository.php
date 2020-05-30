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
     * @param array $advert
     */
    public function createAdvert($fields)
    {
        $this->model->create($fields)->save();
    }
}
