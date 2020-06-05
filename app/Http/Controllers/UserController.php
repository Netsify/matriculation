<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

use App\Models\User;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * Create a new controller instance.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->getAllUsersInfo();
//        $users = User::with('profile')->get();

//        $users->name = $this->userService->getFullName();

        return view('user', compact('users'));
    }
}
