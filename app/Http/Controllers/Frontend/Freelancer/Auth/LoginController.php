<?php

namespace App\Http\Controllers\Frontend\Freelancer\Auth;

use App\Models\Freelancer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RedirectsUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    use RedirectsUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'freelancer/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function __construct()
    {
        $this->middleware('guest:freelancer')->except('logout');
    }

    public function showLoginForm()
    {
        return view('frontend.freelancer.auth.login');
    }

    protected function guard()
    {
        return Auth::guard('freelancer');
    }
    public function logout()
    {
        Auth::guard('freelancer')->logout();
        return redirect('/');
    }
    public function home()
    {
        return view('frontend.freelancer.home');
    }
}
