<?php

namespace Modules\SliderManagement\App\Http\Controllers\Api\Dashboard;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\ServiceManagement\App\resources\Dashboard\ServiceResource;
use Modules\SliderManagement\App\Http\Requests\Api\Dashboard\SliderRequestValidation;
use Modules\SliderManagement\App\Models\Slider;
use Modules\SliderManagement\App\Resources\Api\Dashboard\SliderResource;

class SlidersController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $sliders = Slider::ordered()->get();
        return $this->sendResponse(SliderResource::collection($sliders));
    }

    /**
     * Get hero sliders only
     */
    public function heroSliders()
    {
        $heroSliders = Slider::ofType('hero')->ordered()->get();
        return $this->sendResponse(SliderResource::collection($heroSliders));
    }

    /**
     * Get program sliders only
     */
    public function programSliders()
    {
        $programSliders = Slider::ofType('program')->ordered()->get();
        return $this->sendResponse(SliderResource::collection($programSliders));
    }

    /**
     * Get available slider types
     */
    public function getSliderTypes()
    {
        $types = Slider::getTypes();
        return $this->sendResponse($types);
    }

    public function show($id)
    {
        $slider = Slider::findOrFail($id);
        return $this->sendResponse(new SliderResource($slider));
    }

    /**store method */
    public function store(SliderRequestValidation $request)
    {
        $data = $request->validated();
        
        // Handle background image upload
        if ($request->hasFile('background')) {
            $data['background'] = FileHelper::upload_file('uploads/sliders', $data['background']);
        }
        
        // Set default order if not provided
        if (!isset($data['order'])) {
            $maxOrder = Slider::where('type', $data['type'])->max('order') ?? 0;
            $data['order'] = $maxOrder + 1;
        }
        
        $slider = Slider::create($data);
        return $this->sendResponse(new SliderResource($slider), 'Slider created successfully');
    }

    /**update method */
    public function update(SliderRequestValidation $request, Slider $slider)
    {
        $data = $request->validated();
        
        // Handle background image update
        if ($request->hasFile('background')) {
            $data['background'] = FileHelper::update_file('uploads/sliders', $data['background'], $slider->background);
        }
        
        $slider->update($data);
        return $this->sendResponse(new SliderResource($slider), 'Slider updated successfully');
    }

    /**destroy method */
    public function destroy(Slider $slider){
        /**destroy background image */
        FileHelper::delete_file($slider->background);

        /**destroy slider */
        $slider->delete();
        return $this->sendResponse([], 'Slider deleted successfully');
    }

    /**
     * Bulk delete sliders
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:sliders,id'
        ]);

        $sliders = Slider::whereIn('id', $request->ids)->get();
        
        foreach ($sliders as $slider) {
            FileHelper::delete_file($slider->background);
            $slider->delete();
        }

        return $this->sendResponse([], 'Sliders deleted successfully');
    }

    /**
     * Bulk update sliders
     */
    public function bulkUpdate(Request $request)
    {
        $request->validate([
            'sliders' => 'required|array',
            'sliders.*.id' => 'required|exists:sliders,id',
            'sliders.*.type' => 'sometimes|string|in:hero,program',
            'sliders.*.order' => 'sometimes|integer|min:0',
            'sliders.*.btn_active' => 'sometimes|string|in:0,1'
        ]);

        foreach ($request->sliders as $sliderData) {
            $slider = Slider::find($sliderData['id']);
            $slider->update($sliderData);
        }

        return $this->sendResponse([], 'Sliders updated successfully');
    }

    /**
     * Reorder sliders
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'sliders' => 'required|array',
            'sliders.*.id' => 'required|exists:sliders,id',
            'sliders.*.order' => 'required|integer|min:0'
        ]);

        foreach ($request->sliders as $sliderData) {
            Slider::where('id', $sliderData['id'])
                  ->update(['order' => $sliderData['order']]);
        }

        return $this->sendResponse([], 'Sliders reordered successfully');
    }
}
