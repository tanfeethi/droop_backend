<?php

namespace Modules\TeamManagement\App\Http\Controllers\Api\Dashboard;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Modules\TeamManagement\App\Http\Requests\Api\Dashboard\TeamRequestValidation;
use Modules\TeamManagement\App\Models\Team;
use Modules\TeamManagement\App\resources\Api\Dashboard\TeamResource;

class TeamsController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $team = Team::get();
        return $this->sendResponse(TeamResource::collection($team));
    }


    public function show(Team $team)
    {
        return $this->sendResponse(new TeamResource($team));
    }


    /**store method */
    public function store(TeamRequestValidation $request)
    {
        $data = $request->validated();
        $data['image'] = FileHelper::upload_file('uploads',  $data['image']);
        if(isset($data['cv'])){
            $data['cv'] = FileHelper::upload_file('uploads',  $data['cv']);
        }
        Team::create($data);
        return $this->sendResponse([]);
    }


    /**update method */
    public function update(TeamRequestValidation $request, Team $team)
    {
        $data = $request->validated();
        if(isset($data['image'])){
            $data['image'] = FileHelper::update_file('uploads',$data['image'], $team->image);
        };
        if(isset($data['cv'])){
            $data['cv'] = FileHelper::update_file('uploads',$data['cv'], $team->cv);
        }
       $team->update($data);
        return $this->sendResponse([]);
    }

    /**destroy method */
    public function destroy(Team $team){
        /**destroy image */
        FileHelper::delete_file($team->image);

        /**destroy service */
        $team->delete();
        return $this->sendResponse([]);
    }
}
