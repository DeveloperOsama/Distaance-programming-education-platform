<?php

use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TouristLandmarkController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('dashboard');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // Governorates
    Route::resource('governorates', GovernorateController::class);

    // Tourist Landmarks
    Route::resource('tourist-landmarks', TouristLandmarkController::class);

    // Blogs
    Route::resource('blogs', BlogController::class);
});
