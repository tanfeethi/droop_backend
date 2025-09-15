<?php

namespace Modules\ProjectManagement\App\Http\Controllers\Api\Frontend;

use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\ProjectManagement\App\Models\Project;
use Modules\ProjectManagement\App\resources\Api\Frontend\ProjectResource;
use Modules\ProjectManagement\App\resources\Api\Frontend\SimpleProjectResource;

class ProjectsController extends Controller
{
   use ApiResponseTrait;
   public function list(Request $request){

       $type = request('type') ?? "main";
       $rows = Project::whereNull('parent_id')->where('type',$type)->with('managers','trainers')->latest()->get();
      return $this->sendResponse(ProjectResource::collection($rows));
   }

   public function show(Project $project){
      return $this->sendResponse(new ProjectResource($project));
   }

   public function fetchAllProjects(){
      $rows = Project::latest()->get();
      return $this->sendResponse(SimpleProjectResource::collection($rows));
   }
   
}
