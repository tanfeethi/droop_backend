<?php

namespace Modules\SliderManagement\App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Modules\SliderManagement\App\Models\Slider;
use Modules\SliderManagement\App\Models\SliderDetail;
use Modules\SliderManagement\App\Resources\Api\Frontend\SliderDetailResource;

class ProgramDetailController extends Controller
{
    use ApiResponseTrait;

    /**
     * Get all program slider details
     */
    public function index()
    {
        $programSliders = Slider::ofType(Slider::TYPE_PROGRAM)->with('details')->ordered()->get();
        $details = $programSliders->pluck('details')->flatten();
        
        return $this->sendResponse(SliderDetailResource::collection($details));
    }

    /**
     * Get details for specific program slider
     */
    public function getSliderDetails($sliderId)
    {
        $programSlider = Slider::ofType(Slider::TYPE_PROGRAM)->findOrFail($sliderId);
        $details = $programSlider->details()->ordered()->get();
        
        return $this->sendResponse(SliderDetailResource::collection($details));
    }

    /**
     * Show specific program slider detail
     */
    public function show($id)
    {
        $detail = SliderDetail::whereHas('slider', function($query) {
            $query->ofType(Slider::TYPE_PROGRAM);
        })->findOrFail($id);
        
        return $this->sendResponse(new SliderDetailResource($detail));
    }
}
