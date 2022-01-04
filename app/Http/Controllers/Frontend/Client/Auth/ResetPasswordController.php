<?php

namespace App\Http\Controllers\Frontend\Client\Auth;

use App\Models\Client\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\ResetsPasswords;

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
    protected $redirectTo = 'client/home';
    public function __construct()
    {
        $this->middleware('guest:client');
    }
    public function showResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');

        return view('frontend.client.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
    
    protected function broker(){
        return Password::broker('clients');
    }

    protected function guard(){
        return Auth::guard('client');
    }

}
