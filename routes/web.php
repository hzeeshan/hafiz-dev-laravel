<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', function () {
    return view('welcome');
});

// Blog routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

// Optional: Track views
Route::post('/blog/{post:slug}/view', [BlogController::class, 'trackView'])->name('blog.track-view');
