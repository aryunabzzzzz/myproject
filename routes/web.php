<?php

use App\Http\Controllers\Ajax\CommentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FriendController;
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

Route::get('{username}/trips', [TripController::class, 'getAll'])->name('trips')->middleware('auth');
Route::get('/trip/{id}', [TripController::class, 'getOne'])->name('trip')->middleware('auth');

Route::get('/trips/create', [TripController::class, 'add'])->name('addTrip')->middleware('auth');
Route::post('/trips/create', [TripController::class, 'postAdd'])->name('postAddTrip')->middleware('auth');

Route::post('trip/{id}/addComment', [TripController::class, 'addComment'])->name('addComment')->middleware('auth');

Route::get('/trip/{id}/edit', [TripController::class, 'edit'])->name('editTrip')->middleware('auth');
Route::post('/trip-edit', [TripController::class, 'postEdit'])->name('postEditTrip')->middleware('auth');

Route::get('/trip/{id}/delete', [TripController::class, 'delete'])->name('deleteTrip')->middleware('auth');

Route::get('trip/{id}/join', [TripController::class, 'join'])->name('joinTrip')->middleware('auth');
Route::get('trip/{id}/leave', [TripController::class, 'leave'])->name('leaveTrip')->middleware('auth');

Route::get('/trip/{id}/addPhoto', [PhotoController::class, 'add'])->name('addPhoto')->middleware('auth');
Route::post('/trip-addPhoto', [PhotoController::class, 'postAdd'])->name('postAddPhoto')->middleware('auth');

Route::get('/trip/{id}/photo/{photoId}/edit', [PhotoController::class, 'edit'])->name('editPhoto')->middleware('auth');
Route::post('/trip/{id}/photo-edit', [PhotoController::class, 'postEdit'])->name('postEditPhoto')->middleware('auth');
Route::get('/trip/{id}/photo/{photoId}/delete', [PhotoController::class, 'delete'])->name('deletePhoto')->middleware('auth');

Route::get('/{username}', [ProfileController::class, 'get'])->name('profile')->middleware('auth');

Route::get('/{username}/edit', [ProfileController::class, 'edit'])->name('edit')->middleware('auth');
Route::post('/{username}/edit', [ProfileController::class, 'postEdit'])->name('postEdit')->middleware('auth');

Route::get('/{username}/editAvatar', [ProfileController::class, 'editAvatar'])->name('editAvatar')->middleware('auth');
Route::post('/{username}/editAvatar', [ProfileController::class, 'postEditAvatar'])->name('postEditAvatar')->middleware('auth');

Route::get('/{username}/deleteAvatar', [ProfileController::class, 'deleteAvatar'])->name('deleteAvatar')->middleware('auth');

Route::get('/{username}/follow', [FriendController::class, 'follow'])->name('follow')->middleware('auth');
Route::get('/{username}/unfollow', [FriendController::class, 'unfollow'])->name('unfollow')->middleware('auth');

Route::get('/{username}/followers', [FriendController::class, 'getFollowers'])->name('followers')->middleware('auth');
Route::get('/{username}/followings', [FriendController::class, 'getFollowings'])->name('followings')->middleware('auth');

Route::post('/submit-comment', [CommentController::class, 'create'])->name('submit.comment');
