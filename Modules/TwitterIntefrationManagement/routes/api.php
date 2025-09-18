<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\TwitterIntefrationManagement\App\Http\Controllers\Api\Frontend\TwitterController;
use Modules\TwitterIntefrationManagement\App\Services\Dashboard\TwitterService;

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
    Route::get('twitterintefrationmanagement', fn (Request $request) => $request->user())->name('twitterintefrationmanagement');
});

Route::get('getLatestTweets', function(TwitterService $twitterService){
    dd($twitterService->getLastTweets());
});

Route::group(['prefix' => 'frontend'], function () {
    Route::get('twitter', [TwitterController::class, 'getLatestTweets']);
});



