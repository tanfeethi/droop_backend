<?php

use Illuminate\Support\Facades\Route;
use Modules\PackageManagement\App\Http\Controllers\Api\Dashboard\PackagesController;

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:admin']], function() {
    Route::resource('packages', PackagesController::class)->except(['create', 'edit'])->names([
    'index' => 'dashboard.packages.index',
    'store' => 'dashboard.packages.store',
    'show' => 'dashboard.packages.show',
    'update' => 'dashboard.packages.update',
    'destroy' => 'dashboard.packages.destroy'
]);
});

