<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ErrorSolutionController;
use App\Http\Controllers\ItalianLocalSeoController;
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
    $orderBy = \App\Models\Setting::getToolsOrderBy();
    $tools = \App\Models\Tool::getForDisplay($orderBy);

    return view('tools.index', compact('tools'));
})->name('tools.index');

// Dynamic tool route - automatically works for any tool in the database
Route::get('/tools/{slug}', function (string $slug) {
    // Check if tool exists in database and is active
    $tool = \App\Models\Tool::where('slug', $slug)->where('is_active', true)->first();

    if (! $tool) {
        abort(404);
    }

    // Check if the blade view exists
    $viewName = 'tools.' . $slug;
    if (! view()->exists($viewName)) {
        abort(404);
    }

    return view($viewName, compact('tool'));
})->name('tools.show');

// Tool view tracking
Route::post('/tools/{toolSlug}/view', function (string $toolSlug) {
    \App\Models\ToolView::incrementView($toolSlug);

    return response()->json(['success' => true]);
})->name('tools.track-view');

// Italian SEO landing pages
Route::prefix('it')->name('it.')->group(function () {
    // Services index page
    Route::get('/servizi', [ItalianLocalSeoController::class, 'index'])->name('servizi');

    // Custom static pages (manually created, higher quality)
    Route::get('/sviluppatore-web-torino', [ItalianPagesController::class, 'webDeveloperTorino'])->name('web-developer-torino');
    Route::get('/sviluppatore-laravel-italia', [ItalianPagesController::class, 'laravelDeveloper'])->name('laravel-developer');
    Route::get('/automazione-processi-aziendali', [ItalianPagesController::class, 'processAutomation'])->name('process-automation');

    // Dynamic pSEO pages (generated from JSON data)
    Route::get('/{slug}', [ItalianLocalSeoController::class, 'show'])->name('local-seo');
});

// Laravel Error Solutions (pSEO)
Route::get('/errors', [ErrorSolutionController::class, 'index'])->name('errors.index');
Route::get('/errors/{slug}', [ErrorSolutionController::class, 'show'])->name('errors.show');
