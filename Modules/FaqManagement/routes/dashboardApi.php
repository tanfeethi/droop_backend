<?php

use Illuminate\Support\Facades\Route;
use Modules\FaqManagement\App\Http\Controllers\Api\Dashboard\FaqsController;

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth:admin'],function(){
    Route::resource('faqs', FaqsController::class)->except(['create', 'edit'])->names([
    'index' => 'dashboard.faqs.index',
    'store' => 'dashboard.faqs.store',
    'show' => 'dashboard.faqs.show',
    'update' => 'dashboard.faqs.update',
    'destroy' => 'dashboard.faqs.destroy'
]);
});