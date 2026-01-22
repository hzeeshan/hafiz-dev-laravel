<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ItalianPagesController;
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

Route::get('/tools/base64-encoder', function () {
    return view('tools.base64-encoder');
})->name('tools.base64-encoder');

Route::get('/tools/cron-expression-builder', function () {
    return view('tools.cron-expression-builder');
})->name('tools.cron-expression-builder');

Route::get('/tools/uuid-generator', function () {
    return view('tools.uuid-generator');
})->name('tools.uuid-generator');

Route::get('/tools/regex-tester', function () {
    return view('tools.regex-tester');
})->name('tools.regex-tester');

Route::get('/tools/jwt-decoder', function () {
    return view('tools.jwt-decoder');
})->name('tools.jwt-decoder');

Route::get('/tools/password-generator', function () {
    return view('tools.password-generator');
})->name('tools.password-generator');

Route::get('/tools/hash-generator', function () {
    return view('tools.hash-generator');
})->name('tools.hash-generator');

Route::get('/tools/url-encoder', function () {
    return view('tools.url-encoder');
})->name('tools.url-encoder');

// Italian SEO landing pages
Route::prefix('it')->name('it.')->group(function () {
    Route::get('/sviluppatore-web-torino', [ItalianPagesController::class, 'webDeveloperTorino'])->name('web-developer-torino');
    Route::get('/sviluppatore-laravel-italia', [ItalianPagesController::class, 'laravelDeveloper'])->name('laravel-developer');
    Route::get('/automazione-processi-aziendali', [ItalianPagesController::class, 'processAutomation'])->name('process-automation');
});
