<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authenticate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ToDo;

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

Route::controller(Authenticate::class)->group(function () {
    Route::get('/auth', 'show')->name('login');
    Route::post('/auth', 'login')->name('attach');
    Route::get('/registration', function () {
        return view('registration');
    })->name('reg_form');
    Route::post('registration', 'attach')->name('reg_user');
});

Route::get('/', [ToDo::class, 'index'])->middleware('auth')->name('todo_show');
