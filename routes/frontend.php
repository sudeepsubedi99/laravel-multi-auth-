<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Freelancer\HomeController;
use App\Http\Controllers\Frontend\Client\HomeController as CHome;
use App\Http\Controllers\Frontend\Freelancer\Auth\LoginController;
use App\Http\Controllers\Frontend\Freelancer\Auth\RegisterController;
use App\Http\Controllers\Frontend\Client\Auth\ConfirmPasswordController as CCPC;
use App\Http\Controllers\Frontend\Client\Auth\LoginController as CLogin;

use App\Http\Controllers\Frontend\Freelancer\Auth\ResetPasswordController;
use App\Http\Controllers\Frontend\Freelancer\Auth\ForgotPasswordController;
use App\Http\Controllers\Frontend\Client\Auth\RegisterController as CRegister;
use App\Http\Controllers\Frontend\Client\Auth\ResetPasswordController as CResetPassword;
use App\Http\Controllers\Frontend\Client\Auth\ForgotPasswordController as  CForgotPassword;







Route::get('/', function () {
    return view('welcome');
});

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 // Client Routes 

 Route::prefix('client')->namespace('Client')->group(function(){
    Route::namespace('Auth')->group(function(){
        
        //Login Routes
        Route::get('/login',[CLogin::class,'showLoginForm'])->name('client.login');
        Route::post('/login',[CLogin::class,'login']);
        Route::get('/home',[CHome::class,'home'])->name('client.home');
        Route::post('/logout',[CLogin::class,'logout'])->name('client.logout');
    
        //Register Routes
        Route::get('/register',[CRegister::class,'showRegistrationForm'])->name('client.register');
        Route::post('/register',[CRegister::class,'register']);

        //confirm password routes
        Route::get('/password/confirm',[CCPC::class,'showConfirmForm'])->name('client.password.confirm');
        Route::post('//password/confirm',[CCPC::class,'showConfirmForm']);


        //Forgot Password Routes
        Route::get('/password/reset',[CForgotPassword::class,'showLinkRequestForm'])->name('client.password.request');
        Route::post('/password/email',[CForgotPassword::class,'sendResetLinkEmail'])->name('client.password.email');
    
        //Reset Password Routes
        Route::get('/password/reset/{token}',[CResetPassword::class,'showResetForm'])->name('client.password.reset');
        Route::post('/password/reset',[CResetPassword::class,'reset'])->name('client.password.update');
    });
  });

  // freelancer Routes 

 Route::prefix('/freelancer')->namespace('Freelancer')->group(function(){
    Route::namespace('Auth')->group(function(){
        
        //Login Routes
        Route::get('/login',[LoginController::class,'showLoginForm'])->name('freelancer.login');
        Route::post('/login',[LoginController::class,'login']);
        Route::get('/home',[HomeController::class,'home'])->name('freelancer.home');
        Route::post('/logout',[LoginController::class,'logout'])->name('freelancer.logout');
    
        //Register Routes
        Route::get('/register',[RegisterController::class,'showRegistrationForm'])->name('freelancer.register');
        Route::post('/register',[RegisterController::class,'register']);


        //Forgot Password Routes
        Route::get('/password/reset',[ForgotPasswordController::class,'showLinkRequestForm'])->name('freelancer.password.request');
        Route::post('/password/email',[ForgotPasswordController::class,'sendResetLinkEmail'])->name('freelancer.password.email');
    
        //Reset Password Routes
        Route::get('/password/reset/{token}',[ResetPasswordController::class,'showResetForm'])->name('freelancer.password.reset');
        Route::post('/password/reset',[ResetPasswordController::class,'reset'])->name('freelancer.password.update');
    });
  });