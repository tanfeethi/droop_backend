<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\TeamManagement\App\Http\Controllers\Api\Frontend\TeamsController;

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
    Route::get('teams', [TeamsController::class, 'index']);
    Route::get('teams/{team}', [TeamsController::class, 'show']);
});

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('teammanagement', fn (Request $request) => $request->user())->name('teammanagement');
});
