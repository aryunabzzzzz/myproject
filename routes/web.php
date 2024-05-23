<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/main', [MainController::class, 'main'])->name('main');
Route::get('/search', [MainController::class, 'search'])->name('search')->middleware('auth');

Route::get('/trips', [TripController::class, 'getAll'])->name('trips')->middleware('auth');
Route::get('/trip/{id}', [TripController::class, 'getOne'])->name('trip')->middleware('auth');

Route::get('/trips/create', [TripController::class, 'add'])->name('addTrip')->middleware('auth');
Route::post('/trips/create', [TripController::class, 'postAdd'])->name('postAddTrip')->middleware('auth');

Route::get('/trip/{id}/addPhoto', [PhotoController::class, 'add'])->name('addPhoto')->middleware('auth');
Route::post('/trip/addPhoto', [PhotoController::class, 'postAdd'])->name('postAddPhoto')->middleware('auth');

Route::get('/{nickname}', [ProfileController::class, 'get'])->name('profile')->middleware('auth');

Route::get('/{nickname}/edit', [ProfileController::class, 'edit'])->name('edit')->middleware('auth');
Route::post('/{nickname}/edit', [ProfileController::class, 'postEdit'])->name('postEdit')->middleware('auth');

//Route::get('/{nickname}/trips', [TripController::class, 'getAll'])->name('trips')->middleware('auth');
