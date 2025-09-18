<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\TrainerManagement\App\Http\Controllers\Api\Frontend\TrainersController;

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
    Route::resource('trainers', TrainersController::class)->except(['create', 'edit'])->names([
        'index' => 'frontend.trainers.index',
        'store' => 'frontend.trainers.store',
        'show' => 'frontend.trainers.show',
        'update' => 'frontend.trainers.update',
        'destroy' => 'frontend.trainers.destroy'
    ]);
});


Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('trainermanagement', fn (Request $request) => $request->user())->name('trainermanagement');
});
