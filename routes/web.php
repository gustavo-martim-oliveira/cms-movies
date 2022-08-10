<?php

use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\FrontController;
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

Route::group([
    'as' => 'front.',
], function(){
    Route::get('/', [FrontController::class, 'index'])->name('index');

    // Auth/Register User - Routes
    Route::get('/login', [FrontController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('do.login');
    Route::get('/cria-minha-conta', [FrontController::class, 'register'])->name('register');
    Route::post('/cria-minha-conta', [AuthController::class, 'register'])->name('do.register');
    Route::get('/esqueci-minha-senha', [FrontController::class, 'forgetPassword'])->name('forget-password');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


