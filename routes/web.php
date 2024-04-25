<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/main', [MainController::class, 'main'])->name('main');

Route::get('/trips', [MainController::class, 'trips'])->name('trips');
Route::get('/trips/create', [MainController::class, 'createTrip'])->name('createTrip');

Route::get('/myPage', [MainController::class, 'myPage'])->name('myPage');
