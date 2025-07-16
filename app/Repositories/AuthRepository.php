<?php

namespace App\Repositories;

use App\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthRepository implements AuthInterface
{
    /**
     * Create a new class instance. 
     */
    public function __construct()
    {
        //
    }

    public function login($data)
    {
        return Auth::attempt($data);
    }

    public function register($data)
    {
        return User::create($data);
    }

    public function logout()
    {
        return Auth::logout();
    }
}
