<?php


use Illuminate\Support\Facades\Route;
use Modules\TrainerManagement\App\Http\Controllers\Api\Dashboard\TrainersController;


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

Route::group(['prefix' => 'dashboard','middleware' => 'auth:admin'], function () {
    Route::resource('trainers', TrainersController::class);
//    Route::get('', [TrainersController::class, 'index']);
//    Route::get('staticPages/{name}', [TrainersController::class, 'show']);
//    Route::post('update/staticPages', [TrainersController::class, 'update']);
});

