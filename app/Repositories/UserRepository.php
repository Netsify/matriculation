<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * Create a new UserRepository instance.
     *
     * @param  App\Models\User $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getAllUsers()
    {
        return $this->model->all();
    }

    public function getAllUsersInfo()
    {
        return $this->model->with('profile')->get();
    }
}
