<?php

use App\Http\Controllers\Api\DiscoveredLeadSyncController;
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

// Discovered Lead Sync - Receives leads from local machine
Route::post('/sync/discovered-leads', [DiscoveredLeadSyncController::class, 'store'])
    ->middleware('lead.sync.token')
    ->name('api.sync.discovered-leads');
