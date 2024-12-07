<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HotspotController;
use App\Http\Controllers\OauthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SceneController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/konten', [PageController::class, 'kontenPage'])->name('konten.page');


// Auth
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('oauth/google', [\App\Http\Controllers\OauthController::class, 'redirectToProvider'])->name('oauth.google');
Route::get('oauth/google/callback', [\App\Http\Controllers\OauthController::class, 'handleProviderCallback'])->name('oauth.google.callback');
Route::post('/logout', [OauthController::class, 'logout'])->name('logout')->middleware('auth');

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth']
], function () {
    Route::get('/', [PageController::class, 'dashboard'])->name('dashboard');

    // Contents
    Route::get('/konten', [PageController::class, 'kontenPage'])->name('konten.page');
    Route::resource('/konten', ContentController::class)->names('dashboard_content');
    Route::get('/konten/{slug}/scenes', [ContentController::class, 'content_scenes'])->name('content_scenes');


    // Scenes
    Route::resource('/scene', SceneController::class)->names('dashboard_scene')->except('show');

    // Scene Hotspot
    Route::get('/scene/{id}/hotspot', [HotspotController::class, 'index'])->name('scene_hotspot.index');
    Route::post('/scene/{id}/hotspot', [HotspotController::class, 'store'])->name('scene_hotspot.store');
    Route::delete('/scene/{id}/hotspot', [HotspotController::class, 'destroy'])->name('scene_hotspot.destroy');

    // Admin menu
    Route::resource('/admin', AdminController::class)->only(['index', 'store', 'destroy']);
});

Route::get('/{slug}', [PageController::class, 'konten'])->name('konten');
