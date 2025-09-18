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
    Route::resource('trainers', TrainersController::class)->except(['create', 'edit'])->names([
        'index' => 'dashboard.trainers.index',
        'store' => 'dashboard.trainers.store',
        'show' => 'dashboard.trainers.show',
        'update' => 'dashboard.trainers.update',
        'destroy' => 'dashboard.trainers.destroy'
    ]);
});

