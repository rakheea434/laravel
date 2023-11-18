<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BlogController as FrontendBlogController;
use App\Http\Controllers\ContactController as FrontendContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->controller(UserController::class)->middleware('auth')->name('admin.')->group(function(){
 
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    //User Route
    Route::get('/user',[UserController::class,'index'])->name('user.index');
    Route::get('/user/create',[UserController:: class,'create'])->name('user.create');
    Route::get('/user/{user}','show')->where('id','[0-9]+')->name('user.show');
    Route::post('/user',[UserController::class,'store'])->name('user.store');
    Route::delete('/user/delete/{user}' , [UserController::class,'destroy'])->name('user.delete');
    Route::get('/user/{user}/edit', [UserController::class,'edit'])->name('user.edit');
    Route::get('/user/{update}/edit', [UserController::class,'update'])->name('user.update');
    
    //Blog Route
    Route::resource('/blog', BlogController::class);
    Route::get('/about',[AboutController::class,'index'])->name('about.index');
    Route::get('/contact',[ContactController::class, 'index'])->name('contact.index');
    Route::get('/report' , [ReportsController::class,'index'])->name('report.index');
    Route::get('/settings' , [SettingsController::class,'index'])->name('settings.index');

    Route::get('/profile',[ProfileController::class, 'profile'])->name('profile');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/ownself',[AuthController::class,'ownself'])->name('ownself');
    Route::get('/password/reset',[AuthController::class,'passwordReset'])->name('password.reset');
    Route::post('/password/reset',[AuthController::class,'passwordResetProcess'])->name('password.reset.process');


});
//auth route//
Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('password-recover', [AuthController::class, 'passwordRecover'])->name('password.recover')->middleware('guest');
Route::post('password-recover', [AuthController::class, 'passwordRecoverProcess'])->name('password.recover.store')->middleware('guest');
Route::post('login', [AuthController::class, 'loginProcess'])->name('loginProcess');

Route::get('/reset-password/{token}', [AuthController::class,'resetPassword'])->middleware('guest')->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'passwordUpdate'])->middleware('guest')->name('password.update');

//frontend route

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/blog', [FrontendBlogController::class, 'index'])->name('blog');
Route::get('/blog/{blog}', [FrontendBlogController::class, 'show'])->name('blog.show');
Route::get('/contact', [FrontendContactController::class, 'index'])->name('contact');
Route::post('/contact', [FrontendContactController::class, 'store'])->name('contact.store');

