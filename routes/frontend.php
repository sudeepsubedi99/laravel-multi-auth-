<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Client\HomeController;
use App\Http\Controllers\Frontend\Client\Auth\LoginController;
use App\Http\Controllers\Frontend\Client\Auth\RegisterController;






Route::get('/', function () {
    return view('welcome');
});

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


 Route::prefix('/client')->namespace('Client')->group(function(){
    Route::namespace('Auth')->group(function(){
        
        //Login Routes
        Route::get('/login',[LoginController::class,'showLoginForm'])->name('client.login');
        Route::post('/login',[LoginController::class,'login']);
        Route::get('/home',[HomeController::class,'index'])->name('client.home');
        Route::post('/logout',[LoginController::class,'logout'])->name('client.logout');
    
        //Register Routes
        Route::get('/register',[RegisterController::class,'showRegistrationForm'])->name('client.register');
        Route::post('/register',[RegisterController::class,'register']);
    });
  });