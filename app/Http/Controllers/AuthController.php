<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{
    /**
     * @return mixed
     */
    public function create()
    {
        return View::make('auth.register');
    }
}