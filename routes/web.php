<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/main', [MainController::class, 'main'])->name('main');

Route::get('/trips', [TripController::class, 'getAll'])->name('trips');
Route::get('/trip/{id}', [TripController::class, 'getOne'])->name('trip');

Route::get('/trips/create', [TripController::class, 'add'])->name('addTrip');
Route::post('/trips/create', [TripController::class, 'postAdd'])->name('postAddTrip');

Route::get('/trip/{id}/addPhoto', [PhotoController::class, 'add'])->name('addPhoto');
Route::post('/trip/addPhoto', [PhotoController::class, 'postAdd'])->name('postAddPhoto');

Route::get('/myPage', [MainController::class, 'myPage'])->name('myPage');
