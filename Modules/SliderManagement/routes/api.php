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
    Route::get('sliders', [SlidersController::class, 'index']);
    Route::get('sliders/{id}', [SlidersController::class, 'show']);
    
    // Hero Sliders - Separate API
    Route::prefix('hero')->group(function() {
        Route::get('/', [HeroController::class, 'index']);        // List all hero sliders
        Route::get('/{id}', [HeroController::class, 'show']);      // Show hero slider
    });
    
    // Program Sliders - Separate API
    Route::prefix('program')->group(function() {
        Route::get('/', [ProgramController::class, 'index']);     // List all program sliders
        Route::get('/{id}', [ProgramController::class, 'show']);  // Show program slider
        Route::get('/{id}/details', [ProgramDetailController::class, 'getSliderDetails']); // Get details for specific program slider
        
        // Program Details API
        Route::get('details', [ProgramDetailController::class, 'index']);                    // List all program details
        Route::get('details/slider/{sliderId}', [ProgramDetailController::class, 'getSliderDetails']); // Get details for specific slider
        Route::get('details/{id}', [ProgramDetailController::class, 'show']);                  // Show program detail
    });
});

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('slidermanagement', fn (Request $request) => $request->user())->name('slidermanagement');
});
