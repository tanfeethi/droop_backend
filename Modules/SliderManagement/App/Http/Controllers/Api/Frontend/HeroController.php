<?php

namespace Modules\SliderManagement\App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Modules\SliderManagement\App\Models\Slider;
use Modules\SliderManagement\App\Resources\Api\Frontend\SliderResource;

class HeroController extends Controller
{
    use ApiResponseTrait;

    /**
     * Get all hero sliders
     */
    public function index()
    {
        $heroSliders = Slider::ofType('hero')->ordered()->get();
        return $this->sendResponse(SliderResource::collection($heroSliders));
    }

    /**
     * Show single hero slider
     */
    public function show($id)
    {
        $heroSlider = Slider::ofType('hero')->findOrFail($id);
        return $this->sendResponse(new SliderResource($heroSlider));
    }
}
