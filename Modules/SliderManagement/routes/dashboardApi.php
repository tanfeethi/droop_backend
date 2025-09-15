<?php

use Illuminate\Support\Facades\Route;
use Modules\ServiceManagement\App\Http\Controllers\Dashboard\ServicesController;
use Modules\SliderManagement\App\Http\Controllers\Api\Dashboard\SlidersController;
use Modules\SliderManagement\App\Http\Controllers\Api\Dashboard\HeroController;
use Modules\SliderManagement\App\Http\Controllers\Api\Dashboard\ProgramController;
use Modules\SliderManagement\App\Http\Controllers\Api\Dashboard\ProgramDetailController;

Route::group(['prefix' => 'dashboard','middleware' => 'auth:admin'], function() {
    // General Sliders CRUD Routes
    Route::resource('sliders', SlidersController::class);
    Route::get('slider-types', [SlidersController::class, 'getSliderTypes']);
    
    // Hero Sliders - Separate API
    Route::prefix('hero')->group(function() {
        Route::get('/', [HeroController::class, 'index']);                    // List all hero sliders
        Route::post('/', [HeroController::class, 'store']);                   // Create hero slider
        Route::get('/{id}', [HeroController::class, 'show']);                  // Show hero slider
        Route::put('/{id}', [HeroController::class, 'update']);                // Update hero slider
        Route::delete('/{id}', [HeroController::class, 'destroy']);             // Delete hero slider
        Route::post('/bulk-delete', [HeroController::class, 'bulkDelete']);     // Bulk delete hero sliders
        Route::post('/reorder', [HeroController::class, 'reorder']);             // Reorder hero sliders
        
    });
    
    // Program Sliders - Separate API
    Route::prefix('program')->group(function() {
        Route::get('/', [ProgramController::class, 'index']);                 // List all program sliders
        Route::post('/', [ProgramController::class, 'store']);                 // Create program slider
        Route::get('/{id}', [ProgramController::class, 'show']);                // Show program slider
        Route::put('/{id}', [ProgramController::class, 'update']);             // Update program slider
        Route::delete('/{id}', [ProgramController::class, 'destroy']);        // Delete program slider
        Route::post('/bulk-delete', [ProgramController::class, 'bulkDelete']); // Bulk delete program sliders
        Route::post('/reorder', [ProgramController::class, 'reorder']);       // Reorder program sliders
        
        // Program Details API
        Route::prefix('details')->group(function() {
            Route::get('/', [ProgramDetailController::class, 'index']);                    // List all program details
            Route::post('/', [ProgramDetailController::class, 'store']);                   // Create program detail
            Route::get('/slider/{sliderId}', [ProgramDetailController::class, 'getSliderDetails']); // Get details for specific slider
            Route::get('/{id}', [ProgramDetailController::class, 'show']);                  // Show program detail
            Route::put('/{id}', [ProgramDetailController::class, 'update']);                // Update program detail
            Route::delete('/{id}', [ProgramDetailController::class, 'destroy']);             // Delete program detail
            Route::post('/bulk-delete', [ProgramDetailController::class, 'bulkDelete']);     // Bulk delete program details
            Route::post('/reorder', [ProgramDetailController::class, 'reorder']);             // Reorder program details
        });
    });
});

