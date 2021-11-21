<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ PostController };
use App\Http\Controllers\{ UserController };
use App\Http\Controllers\{ FriendRequestController };
use App\Http\Controllers\{ CommentsController };
use App\Http\Controllers\{ CommunityController };

Route::get('/', [UserController::class, 'index'])->middleware(['auth']);
Route::get('/home', [UserController::class, 'index'])->middleware(['auth'])->name('home');
Route::get("/profile/{id}", [UserController::class, 'profile'])->middleware(['auth'])->name('profile');
Route::get('/settings-profile/{id}', [UserController::class, 'settingsProfile'])->middleware(['auth'])->name('settings-profile');
Route::get('/community', [UserController::class, 'community'])->middleware(['auth'])->name('community');
Route::get('/notifications', [UserController::class, 'notifications'])->middleware(['auth'])->name('notifications');
Route::get('/group/{id}', [CommunityController::class, 'getCommunitys'])->middleware(['auth'])->name('group');
Route::get('/new-group', [CommunityController::class, 'newGroup'])->middleware(['auth'])->name('new-group');

//CREATE POST
Route::post('/home', [PostController::class, 'store'])->name('store');
Route::post('/community', [FriendRequestController::class, 'addFriend'])->name('friend-store');
Route::post('/notifications', [CommentsController::class, 'store'])->name('comments-store');
Route::post('/search', [UserController::class, 'searchStore'])->name('search-store');
Route::post('/settings-profile/{id}', [UserController::class, 'addCompany'])->name('settings-profile-professional');
Route::post('/group', [CommunityController::class, 'createNewCommunity'])->middleware(['auth'])->name('new-group-store');

//UPDATE POST
Route::put('/home', [UserController::class, 'update'])->name('update');
Route::put('/notifications', [FriendRequestController::class, 'requestFriend'])->name('friend-request');
Route::put('/profile/{id}', [UserController::class, 'store'])->name('user-store');
Route::put('/settings-profile/{id}', [UserController::class, 'addAboutUser'])->name('add-about-user');
Route::put('/group/{id}', [CommunityController::class, 'participateInTheCommunity'])->middleware(['auth'])->name('groups-store');


require __DIR__.'/auth.php';
