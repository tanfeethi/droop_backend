<?php

namespace Modules\SliderManagement\App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Modules\SliderManagement\App\Models\Slider;
use Modules\SliderManagement\App\Resources\Api\Frontend\SliderResource;

class ProgramController extends Controller
{
    use ApiResponseTrait;

    /**
     * Get all program sliders
     */
    public function index()
    {
        $programSliders = Slider::ofType('program')->with('details')->ordered()->get();
        return $this->sendResponse(SliderResource::collection($programSliders));
    }

    /**
     * Show single program slider
     */
    public function show($id)
    {
        $programSlider = Slider::ofType('program')->with('details')->findOrFail($id);
        return $this->sendResponse(new SliderResource($programSlider));
    }
}
