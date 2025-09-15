<?php

namespace Modules\SliderManagement\App\Http\Controllers\Api\Dashboard;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Modules\SliderManagement\App\Http\Requests\Api\Dashboard\ProgramRequestValidation;
use Modules\SliderManagement\App\Models\Slider;
use Modules\SliderManagement\App\Resources\Api\Dashboard\SliderResource;

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

    /**
     * Create new program slider
     */
    public function store(ProgramRequestValidation $request)
    {
        $data = $request->validated();
        $data['type'] = 'program'; // Force type to program
        
        // Handle background image upload
        if ($request->hasFile('background')) {
            $data['background'] = FileHelper::upload_file('uploads/sliders/program', $data['background']);
        }
        
        // Set default order if not provided
        if (!isset($data['order'])) {
            $maxOrder = Slider::ofType('program')->max('order') ?? 0;
            $data['order'] = $maxOrder + 1;
        }
        
        $programSlider = Slider::create($data);
        return $this->sendResponse(new SliderResource($programSlider), 'Program slider created successfully');
    }

    /**
     * Update program slider
     */
    public function update(ProgramRequestValidation $request, $id)
    {
        $programSlider = Slider::ofType('program')->findOrFail($id);
        $data = $request->validated();
        
        // Handle background image update
        if ($request->hasFile('background')) {
            $data['background'] = FileHelper::update_file('uploads/sliders/program', $data['background'], $programSlider->background);
        }
        
        $programSlider->update($data);
        return $this->sendResponse(new SliderResource($programSlider), 'Program slider updated successfully');
    }

    /**
     * Delete program slider
     */
    public function destroy($id)
    {
        $programSlider = Slider::ofType('program')->findOrFail($id);
        
        // Delete background image
        FileHelper::delete_file($programSlider->background);
        
        // Delete slider
        $programSlider->delete();
        return $this->sendResponse([], 'Program slider deleted successfully');
    }

    /**
     * Bulk delete program sliders
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:sliders,id'
        ]);

        $programSliders = Slider::ofType('program')->whereIn('id', $request->ids)->get();
        
        foreach ($programSliders as $programSlider) {
            FileHelper::delete_file($programSlider->background);
            $programSlider->delete();
        }

        return $this->sendResponse([], 'Program sliders deleted successfully');
    }

    /**
     * Reorder program sliders
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'sliders' => 'required|array',
            'sliders.*.id' => 'required|exists:sliders,id',
            'sliders.*.order' => 'required|integer|min:0'
        ]);

        foreach ($request->sliders as $sliderData) {
            Slider::ofType('program')
                  ->where('id', $sliderData['id'])
                  ->update(['order' => $sliderData['order']]);
        }

        return $this->sendResponse([], 'Program sliders reordered successfully');
    }
}
