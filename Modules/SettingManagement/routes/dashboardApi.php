<?php

use Illuminate\Support\Facades\Route;
use Modules\SettingManagement\App\Http\Controllers\Api\Dashboard\NavBarController;
use Modules\SettingManagement\App\Http\Controllers\Api\Dashboard\SettingsController;

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth:admin'], function () {
    Route::put('settings/update', [SettingsController::class, 'update']);
    Route::get('settings/list', [SettingsController::class, 'list']);

    Route::post('navbar/update/{id}', [NavBarController::class, 'update']);
    Route::get('navbar/list', [NavBarController::class, 'list']);
});
