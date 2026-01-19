<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\NewsletterController;
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

// Newsletter routes
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/count', [NewsletterController::class, 'count'])->name('newsletter.count');

// Tools routes
Route::get('/tools', function () {
    return view('tools.index');
})->name('tools.index');

Route::get('/tools/json-formatter', function () {
    return view('tools.json-formatter');
})->name('tools.json-formatter');
