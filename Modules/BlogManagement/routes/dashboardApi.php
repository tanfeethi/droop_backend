<?php
use Illuminate\Support\Facades\Route;
use Modules\BlogManagement\App\Http\Controllers\Api\Dashboard\BlogsController;



Route::group(['prefix' => 'dashboard','middleware' => 'auth:admin'], function() {
    Route::resource('blogs', BlogsController::class);
});