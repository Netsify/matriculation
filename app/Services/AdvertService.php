<?php

namespace App\Services;

use App\Repositories\AdvertRepository;

class AdvertService
{
    /**
     * Create a new service instance.
     *
     * @return void
     */
    public function __construct(AdvertRepository $advertRepository)
    {
        $this->advertRepository = $advertRepository;
    }
}
