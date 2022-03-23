<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('main');

//Route::group(['middleware' => 'guest'], function ()
//{
//    Route::get('registration', [\App\Http\Controllers\RegistrationController::class, 'index'])->name('registration');
//    Route::post('registration', [\App\Http\Controllers\RegistrationController::class, 'store'])->name('registration.store');
//    Route::get('login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
//    Route::post('login', [\App\Http\Controllers\LoginController::class, 'loginSend'])->name('login.send');
//});

Auth::routes(['verify' => true]);



Route::group(['middleware' => 'auth'], function ()
{
    Route::get('logout', [\App\Http\Controllers\MyLoginController::class, 'logOut'])->name('logout');

    Route::group(['middleware' => 'verified'], function ()
    {
        Route::get('addalbum', [\App\Http\Controllers\AddAlubmController::class, 'index'])->name('addalbum');
        Route::post('addalbum', [\App\Http\Controllers\AddAlubmController::class, 'store'])->name('addalbum.store');
    });
});

Route::fallback(function ()
{
    abort(404, 'Page Not Found');
});


