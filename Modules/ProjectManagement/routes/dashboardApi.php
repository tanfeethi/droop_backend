<?php

use Illuminate\Support\Facades\Route;
use Modules\ProjectManagement\App\Http\Controllers\Api\Dashboard\ProjectsController;
use Modules\ProjectManagement\App\Http\Controllers\Api\Dashboard\ProjectImagesController;
use Modules\ProjectManagement\App\Http\Controllers\Api\Dashboard\ProjectManagersController;
use Modules\ProjectManagement\App\Http\Controllers\Api\Dashboard\ProjectTrainersController;


Route::group(['prefix' => 'dashboard'],function(){
    Route::resource('projects', ProjectsController::class);
    Route::post('projects/attachTrainers', [ProjectTrainersController::class,'attachTrainersToProject']);
    Route::post('projects/attachManagers', [ProjectManagersController::class,'attachManagersToProject']);
    Route::get('projects/removeTrainer/{projectId}/{trainerId}', [ProjectTrainersController::class,'removeTrainer']);
    Route::get('projects/removeManager/{projectId}/{managerId}', [ProjectManagersController::class,'removeManager']);
});
