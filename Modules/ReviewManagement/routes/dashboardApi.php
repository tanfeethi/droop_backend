<?php

use Illuminate\Support\Facades\Route;
use Modules\ReviewManagement\App\Http\Controllers\Api\Dashboard\ReviewsController;

Route::group(['prefix' => 'dashboard','middleware' => 'auth:admin'],function(){
    Route::resource('reviews', ReviewsController::class)->except(['create', 'edit'])->names([
    'index' => 'dashboard.reviews.index',
    'store' => 'dashboard.reviews.store',
    'show' => 'dashboard.reviews.show',
    'update' => 'dashboard.reviews.update',
    'destroy' => 'dashboard.reviews.destroy'
]);
});