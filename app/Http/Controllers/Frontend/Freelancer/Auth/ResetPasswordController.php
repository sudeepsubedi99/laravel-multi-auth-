<?php

namespace App\Http\Controllers\Frontend\Freelancer\Auth;

use App\Models\Freelancer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
    

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = 'freelancer/home';
    public function __construct()
    {
        $this->middleware('guest:freelancer');
    }
    public function showResetForm(Request $request)
    {        
        $token = $request->route()->parameter('token');
        return view('frontend.freelancer.auth.passwords.reset')->with(
            ['token' => $token, 'email' =>$request->email]
        );
    }
    protected function broker(){
        return Password::broker('freelancers');
    }

    protected function guard(){
        return Auth::guard('freelancer');
    }
}
