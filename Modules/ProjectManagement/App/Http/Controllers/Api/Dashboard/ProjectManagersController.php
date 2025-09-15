<?php

namespace Modules\ProjectManagement\App\Http\Controllers\Api\Dashboard;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Modules\ProjectManagement\App\Models\Project;
use Modules\ProjectManagement\App\Models\ProjectManager;
use Modules\ProjectManagement\App\Http\Requests\Api\Dashboard\AttachManagersToProjectRequestValidation;

class ProjectManagersController extends Controller
{
   use ApiResponseTrait;
   public function attachManagersToProject(AttachManagersToProjectRequestValidation $request){
        $data = $request->validated();
        foreach($data['managers'] as  $manager){
          ProjectManager::create([
               'project_id' => $data['project_id'],
               'name' => $manager['name'],
               'position' => $manager['position'],
               'arrange' => $manager['arrange']
          ]);
        }
        return $this->sendResponse([]);
   } 
   
   public function removeManager($projectId, $managerId){
          $projectManager = ProjectManager::where([
               'id' => $managerId,
               'project_id' => $projectId,
          ])->first();
          if(!$projectManager){
          return $this->sendResponse([], 'fail','manager not in this project or project is not found !', 404);
          }
          $projectManager->delete();
          return $this->sendResponse([]);
     }

}
