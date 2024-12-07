<?php

use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'jwt'], function () {
    Route::get('/test', function () {
        return response()->json('success');
    });
});

Route::get('/konten/{slug}', [ContentController::class, 'get_content_data'])->name('get_content');
