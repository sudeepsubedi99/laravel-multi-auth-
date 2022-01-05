<?php


use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeController as HC;
use App\Http\Controllers\Admin\Auth\LoginController as LC;
use App\Http\Controllers\Admin\Auth\ResetPasswordController as RPC;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController as FPC;

Route::prefix('/admin')->namespace('Admin')->group(function(){
    Route::namespace('Auth')->group(function(){
        
        //Login Routes
        Route::get('/login',[LC::class,'showLoginForm'])->name('admin.login');
        Route::post('/login',[LC::class,'login']);
        Route::get('/home',[HC::class,'index'])->name('admin.home');
        Route::post('/logout',[LC::class,'logout'])->name('admin.logout');
    
        //Forgot Password Routes
        Route::get('/password/reset',[FPC::class,'showLinkRequestForm'])->name('admin.password.request');
        Route::post('/password/email',[FPC::class,'sendResetLinkEmail'])->name('admin.password.email');
    
        //Reset Password Routes
        Route::get('/password/reset/{token}',[RPC::class,'showResetForm'])->name('admin.password.reset');
        Route::post('/password/reset',[RPC::class,'reset'])->name('admin.password.update');
    
    });
  });