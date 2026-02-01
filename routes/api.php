<?php

use App\Http\Controllers\Api\TrendingTopicSyncController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the RouteServiceProvider and are assigned
| the "api" middleware group. Routes are prefixed with /api.
|
*/

// Trending Topic Sync - Receives topics from local machine
Route::post('/sync/trending-topics', [TrendingTopicSyncController::class, 'store'])
    ->middleware('sync.token')
    ->name('api.sync.trending-topics');
