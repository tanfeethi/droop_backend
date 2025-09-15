<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\ClientManagement\App\Http\Controllers\Api\Frontend\ClientsController;

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
    Route::get('clientmanagement', fn (Request $request) => $request->user())->name('clientmanagement');
});

Route::group(['prefix' => 'frontend'],function(){
    route::get('clients', [ClientsController::class, 'list']);
});
