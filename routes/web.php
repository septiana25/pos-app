<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect()->to('login');
    })->name('home');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'handleLogin'])->name('login');
});

Route::middleware('auth')->group(function () {    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //name route: mater-data.kategori.index
    //slug routemaster-data/kategori/index
    Route::prefix('master-data')->as('master-data.')->group(function (){
        Route::prefix('kategori')->as('kategori.')->controller(KategoriController::class)->group(function (){
            Route::get('/', 'index')->name('index');
        });
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});