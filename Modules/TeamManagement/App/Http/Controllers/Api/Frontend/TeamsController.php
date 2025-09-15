<?php

namespace Modules\TeamManagement\App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\TeamManagement\App\Models\Team;
use Modules\TeamManagement\App\resources\Api\TeamResource;

class TeamsController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $teams = Team::get();
        return $this->sendResponse(TeamResource::collection($teams));
    }

    /**
     * Show the specified resource.
     */
    public function show(Team $team)
    {
        return $this->sendResponse(new TeamResource($team));
    }
    
}
