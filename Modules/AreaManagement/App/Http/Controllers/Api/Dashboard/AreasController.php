<?php

namespace Modules\AreaManagement\App\Http\Controllers\Api\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\AreaManagement\App\Models\Area;
use Modules\AreaManagement\App\resources\Api\Dashboard\AreaResource;
use Modules\AreaManagement\App\Http\Requests\Api\Dashboard\AreaRequestValidation;

class AreasController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $rows = Area::get();
        return $this->sendResponse(AreaResource::collection($rows));
    }

    public function show(Area $area)
    {
        return $this->sendResponse(new AreaResource($area));
    }

    /**store method */
    public function store(AreaRequestValidation $request)
    {
        $data = $request->validated();
        Area::create($data);
        return $this->sendResponse([]);
    }

    /**update method */
    public function update(AreaRequestValidation $request, area $area)
    {
       $data = $request->validated();
       $area->update($data);
       return $this->sendResponse([]);
    }

    /**destroy method */
    public function destroy(Area $area){
        $area->delete();
        return $this->sendResponse([]);
    }
}
