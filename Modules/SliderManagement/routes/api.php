<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\SliderManagement\App\Http\Controllers\Api\Frontend\SlidersController;
use Modules\SliderManagement\App\Http\Controllers\Api\Frontend\HeroController;
use Modules\SliderManagement\App\Http\Controllers\Api\Frontend\ProgramController;
use Modules\SliderManagement\App\Http\Controllers\Api\Frontend\ProgramDetailController;

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
    // General Sliders Routes
    Route::resource('sliders', SlidersController::class)->only(['index', 'show']);
    
    // Hero Sliders - Separate API
    Route::prefix('hero')->group(function() {
        Route::resource('/', HeroController::class)->only(['index', 'show']);
    });
    
    // Program Sliders - Separate API
    Route::prefix('program')->group(function() {
        // Program Details API - Must be before dynamic routes
        Route::resource('details', ProgramDetailController::class)->only(['index', 'show']);
        Route::get('details/slider/{sliderId}', [ProgramDetailController::class, 'getSliderDetails']); // Get details for specific slider
        
        // Program Sliders API
        Route::resource('/', ProgramController::class)->only(['index', 'show']);
        Route::get('/{id}/details', [ProgramDetailController::class, 'getSliderDetails']); // Get details for specific program slider
    });
});

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('slidermanagement', fn (Request $request) => $request->user())->name('slidermanagement');
});
