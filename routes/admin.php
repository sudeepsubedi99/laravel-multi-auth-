<?php


use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;

Route::prefix('/admin')->namespace('Admin')->group(function(){
    Route::namespace('Auth')->group(function(){
        
        //Login Routes
        Route::get('/login',[LoginController::class,'showLoginForm'])->name('admin.login');
        Route::post('/login',[LoginController::class,'login']);
        Route::get('/home',[HomeController::class,'index'])->name('admin.home');
        Route::post('/logout',[LoginController::class,'logout'])->name('admin.logout');
    
        //Forgot Password Routes
        Route::get('/password/reset',[ForgotPasswordController::class,'showLinkRequestForm'])->name('admin.password.request');
        Route::post('/password/email',[ForgotPasswordController::class,'sendResetLinkEmail'])->name('admin.password.email');
    
        //Reset Password Routes
        Route::get('/password/reset/{token}',[ResetPasswordController::class,'showResetForm'])->name('admin.password.reset');
        Route::post('/password/reset',[ResetPasswordController::class,'reset'])->name('admin.password.update');
    
    });
  });