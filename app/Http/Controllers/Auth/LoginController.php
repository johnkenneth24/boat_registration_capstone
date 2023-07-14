<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function username()
    {
        return 'username';
    }

    public function credentials(Request $request)
    {
        return [
            'username' => $request->username,
            'password' => $request->password,
        ];
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
