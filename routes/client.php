<?php

use App\Http\Controllers\Client\ClientAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('client')->group(function () {

    Route::get('/', function () {
        if (Auth::guard('client')->check()) {
            return redirect()->route('client.dashboard');
        }
        return redirect()->route('client.loginForm');
    })->name('client');

    Route::name('client.')->group(function () {
        Route::middleware(['auth:client'])->group(function () {
            Route::controller(ClientAuthController::class)->group(function () {
                Route::get('dashboard', 'dashboard')->name('dashboard');
                Route::post('logout', 'logout')->name('logout');
            });
        });

        Route::middleware(['guest:client'])->group(function () {
            Route::controller(ClientAuthController::class)->group(function () {
                Route::get('login', 'loginForm')->name('loginForm');
                Route::post('login', 'login')->name('login');
            });
        });
    });
});
