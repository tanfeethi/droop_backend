<?php

namespace Modules\ProjectManagement\App\Http\Controllers\Api\Dashboard;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Modules\ProjectManagement\App\Http\Requests\Api\Dashboard\ProjectRequestValidation;
use Modules\ProjectManagement\App\Models\Project;
use Modules\ProjectManagement\App\Models\ProjectImage;
use Modules\ProjectManagement\App\resources\Api\Dashboard\ProjectResource;

class ProjectsController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $type = request('type') ?? "main";
        $projects = Project::whereNull('parent_id')->where('type',$type)->with('managers','trainers')->latest()->get();
        return $this->sendResponse(ProjectResource::collection($projects));
    }

    /**store method */
    public function store(ProjectRequestValidation $request)
    {
        $data = $request->validated();
        if(isset($data['thumbnail'])){
            $data['thumbnail'] = FileHelper::upload_file('uploads',$data['thumbnail']);
        }
         if(isset($data['report'])){
            $data['report'] = FileHelper::upload_file('uploads',$data['report']);
        }
        Project::create($data);
        return $this->sendResponse([]);
    }

    /**show method */
    public function show(Project $project){
        return $this->sendResponse(new ProjectResource($project));
    }

    /**update method */
    public function update(ProjectRequestValidation $request, Project $project)
    {
        $data = $request->validated();
        if(isset($data['thumbnail'])){
            $data['thumbnail'] = FileHelper::update_file('uploads',$data['thumbnail'],$project->thumbnail);
        }
        if(isset($data['report'])){
            $data['report'] = FileHelper::update_file('uploads',$data['report'],$project->report);
        }
        $project->update($data);
        return $this->sendResponse([]);
    }

    /**destroy method */
    public function destroy(Project $project){
        $project->delete();
        return $this->sendResponse([]);
    }
   
}
