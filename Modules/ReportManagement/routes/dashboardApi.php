<?php


use Illuminate\Support\Facades\Route;
use Modules\ReportManagement\App\Http\Controllers\Api\Dashboard\ReportsController;


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

Route::group(['prefix' => 'dashboard','middleware' => 'auth:admin'], function () {
    Route::resource('reports', ReportsController::class)->except(['create', 'edit'])->names([
        'index' => 'dashboard.reports.index',
        'store' => 'dashboard.reports.store',
        'show' => 'dashboard.reports.show',
        'update' => 'dashboard.reports.update',
        'destroy' => 'dashboard.reports.destroy'
    ]);
});
