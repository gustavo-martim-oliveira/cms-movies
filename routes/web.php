<?php

use Illuminate\Support\Facades\Route;
use App\Gateways\MercadoPago\MercadoPago;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\FrontController;

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

    //Auth group
    Route::group([
        'prefix' => 'cliente',
        'middleware' => 'auth',
        'as' => 'auth.'
    ], function(){
        Route::get('/profile', [FrontController::class, 'profile'])->name('profile');

        Route::group([
            'prefix' => 'user',
            'as' => 'user.'
        ], function(){
            Route::put('/change-password', [FrontController::class, 'changePassword'])->name('change-password');
            Route::put('/change-profile', [FrontController::class, 'changeProfile'])->name('change-profile');
        });

    });

    // Auth/Register User - Routes
    Route::get('/login', [FrontController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('do.login');
    Route::get('/cria-minha-conta', [FrontController::class, 'register'])->name('register');
    Route::post('/cria-minha-conta', [AuthController::class, 'register'])->name('do.register');
    Route::get('/esqueci-minha-senha', [FrontController::class, 'forgetPassword'])->name('forget-password');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    //Checkout routes
    Route::get('checkout/{plan}', [FrontController::class, 'checkout'])->name('checkout');
});

Route::get('teste', function(){
    $mp = new MercadoPago;
    $costumer = [
        'email' => 'gustavo.drf@hotmail.com',
        'first_name' => 'Gustavo',
        'last_name' => 'Martim',
        'identification' => [
            'type' => 'CPF',
            'number' => '39730082804'
        ]
    ];

    return $mp->pix([
        'value' => "0.01",
        'description' => 'teste'
    ], $costumer)->qr_code;


});

