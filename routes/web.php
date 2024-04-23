<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function(){
    Route::get('/register','register_view')->name('register.view');
    Route::post('/add-register','register_control')->name('register.control');
    Route::get('/','login_view')->name('login.view');
    Route::post('/login','login_control')->name('login.control');
});

Route::controller(HomeController::class)->group(function(){
    Route::get('/member-dashboard','member_index')->name('member.index');
    Route::get('/admin-dashboard','admin_index')->name('admin.index');
});
