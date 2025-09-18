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
        Route::resource('/', HeroController::class)->except(['create', 'edit']);
        Route::post('/bulk-delete', [HeroController::class, 'bulkDelete']);     // Bulk delete hero sliders
        Route::post('/reorder', [HeroController::class, 'reorder']);             // Reorder hero sliders
    });
    
    // Program Sliders - Separate API
    Route::prefix('program')->group(function() {
        // Program Details API - Resource Routes (MUST come before dynamic routes)
        Route::resource('details', ProgramDetailController::class)->except(['create', 'edit']);
        Route::get('details/slider/{sliderId}', [ProgramDetailController::class, 'getSliderDetails']); // Get details for specific slider
        Route::post('details/bulk-delete', [ProgramDetailController::class, 'bulkDelete']);     // Bulk delete program details
        Route::post('details/reorder', [ProgramDetailController::class, 'reorder']);             // Reorder program details
        
        // Program Slider Routes (after details routes)
        Route::resource('/', ProgramController::class)->except(['create', 'edit']);
        Route::post('/bulk-delete', [ProgramController::class, 'bulkDelete']); // Bulk delete program sliders
        Route::post('/reorder', [ProgramController::class, 'reorder']);       // Reorder program sliders
    });
});

