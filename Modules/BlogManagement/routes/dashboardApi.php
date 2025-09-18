<?php
use Illuminate\Support\Facades\Route;
use Modules\BlogManagement\App\Http\Controllers\Api\Dashboard\BlogsController;



Route::group(['prefix' => 'dashboard','middleware' => 'auth:admin'], function() {
    Route::resource('blogs', BlogsController::class)->except(['create', 'edit'])->names([
    'index' => 'dashboard.blogs.index',
    'store' => 'dashboard.blogs.store',
    'show' => 'dashboard.blogs.show',
    'update' => 'dashboard.blogs.update',
    'destroy' => 'dashboard.blogs.destroy'
]);
});