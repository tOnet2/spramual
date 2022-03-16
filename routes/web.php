<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'guest'], function ()
{
    Route::get('registration', [\App\Http\Controllers\RegistrationController::class, 'index'])->name('registration');
    Route::post('registration', [\App\Http\Controllers\RegistrationController::class, 'store'])->name('registration.store');
    Route::get('login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
    Route::post('login', [\App\Http\Controllers\LoginController::class, 'loginSend'])->name('login.send');
});

Route::group(['middleware' => 'auth'], function ()
{
    Route::get('logout', [\App\Http\Controllers\LoginController::class, 'logOut'])->name('logout');
});

Route::fallback(function ()
{
    abort(404, 'Page Not Found');
});
