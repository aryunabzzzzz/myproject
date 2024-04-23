<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/main', [AuthController::class, 'main'])->name('main');

Route::get('/trips', [AuthController::class, 'trips'])->name('trips');

Route::get('/myPage', [AuthController::class, 'myPage'])->name('myPage');
