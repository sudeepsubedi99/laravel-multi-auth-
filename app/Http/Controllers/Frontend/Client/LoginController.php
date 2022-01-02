<?php

namespace App\Http\Controllers\Frontend\Client;

use Illuminate\Http\Request;
use App\Models\Client\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers, RedirectsUsers;
   
    public $redirectTo= 'client/home';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('guest:client')->except('logout');
    }

    public function showLoginForm()
    {
        return view('frontend.client.auth.login');
    }

    protected function guard()
    {
        return Auth::guard('client');
    }
    public function logout()
    {
        Auth::guard('client')->logout();
        return redirect('/');
    }
    public function home()
    {
        return view('frontend.client.home');
    }
}
