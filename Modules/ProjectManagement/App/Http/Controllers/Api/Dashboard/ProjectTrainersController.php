<?php

namespace Modules\ProjectManagement\App\Http\Controllers\Api\Dashboard;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Modules\ProjectManagement\App\Models\Project;
use Modules\ProjectManagement\App\Models\ProjectTrainer;
use Modules\ProjectManagement\App\Http\Requests\Api\Dashboard\AttachTrainersToProjectRequestValidation;

class ProjectTrainersController extends Controller
{
   use ApiResponseTrait;
   public function attachTrainersToProject(AttachTrainersToProjectRequestValidation $request){
        $data = $request->validated();
        $project = Project::find($data['project_id']);
        $project->trainers()->syncWithoutDetaching($data['trainersIds']);
        return $this->sendResponse([]);
   }
   public function removeTrainer($projectId,$trainerId){
        $projectTrainer = ProjectTrainer::where([
          'trainer_id' => $trainerId,
          'project_id' => $projectId
        ])->first();
        if(!$projectTrainer){
          return $this->sendResponse([], 'fail','trainer not in this project or project is not found !', 404);
        }
        $projectTrainer->delete();
        return $this->sendResponse([]);
   }
}
