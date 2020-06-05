<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * Create a new service instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->userService = $user;
    }

    public function getAllUsers()
    {
        return $this->userService->all();
    }

    public function getAllUsersInfo()
    {
        return $this->userService->with('profile')->get();
    }

    public function getFullName()
    {
        return $this->userService->surname . ' ' . $this->userService->name . ' ' . $this->userService->patronymic;
    }

}
