<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\SettingManagement\App\Http\Controllers\Api\Frontend\NavBarController;
use Modules\SettingManagement\App\Http\Controllers\Api\Frontend\SettingsController;

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

Route::group(['prefix' => 'frontend'],function(){
    Route::get('settings', [SettingsController::class, 'index']);
    Route::get('settings/list', [SettingsController::class, 'index']);
    Route::get('navbar', [NavbarController::class, 'index']);
    Route::get('navbar/list', [NavbarController::class, 'index']);
});

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('settingmanagement', fn (Request $request) => $request->user())->name('settingmanagement');
});
