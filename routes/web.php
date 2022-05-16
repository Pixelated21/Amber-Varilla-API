<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['middleware' => 'guest'],static function (){
    Route::get('/login',\App\Http\Livewire\Authentication\Login::class)->name('login');
    Route::get('/register',\App\Http\Livewire\Authentication\Register::class)->name('register');
});

