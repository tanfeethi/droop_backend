<?php

use Illuminate\Support\Facades\Route;
use Modules\CoachManagment\App\Http\Controllers\Api\Frontend\CoachesController;

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

Route::group(['prefix' => 'frontend'], function () {
    Route::post('coaches/join', [CoachesController::class, 'join'])->name('frontend.coaches.join');
});
