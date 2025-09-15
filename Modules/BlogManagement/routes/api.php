<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\BlogManagement\App\Http\Controllers\Api\Frontend\BlogsController;

/*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
*/

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('blogmanagement', fn (Request $request) => $request->user())->name('blogmanagement');
});

Route::group(['prefix' => 'frontend'], function () {
    Route::get('blogs', [BlogsController::class, 'index']);
    Route::get('blogs/{blog}', [BlogsController::class, 'show']);
});

