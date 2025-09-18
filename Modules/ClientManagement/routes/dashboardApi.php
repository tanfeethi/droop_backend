<?php

use Illuminate\Support\Facades\Route;
use Modules\ClientManagement\App\Http\Controllers\Api\Dashboard\ClientsController;

Route::group(['prefix' => 'dashboard'],function(){
    Route::resource('clients', ClientsController::class)->except(['create', 'edit'])->names([
    'index' => 'dashboard.clients.index',
    'store' => 'dashboard.clients.store',
    'show' => 'dashboard.clients.show',
    'update' => 'dashboard.clients.update',
    'destroy' => 'dashboard.clients.destroy'
]);
});