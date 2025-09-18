<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\AreaManagement\App\Http\Controllers\Api\Dashboard\AreasController;

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



Route::group(['prefix' => 'dashboard','middleware' => 'auth:admin'],function(){
    Route::resource('areas', AreasController::class)->except(['create', 'edit'])->names([
    'index' => 'dashboard.areas.index',
    'store' => 'dashboard.areas.store',
    'show' => 'dashboard.areas.show',
    'update' => 'dashboard.areas.update',
    'destroy' => 'dashboard.areas.destroy'
]);
});
