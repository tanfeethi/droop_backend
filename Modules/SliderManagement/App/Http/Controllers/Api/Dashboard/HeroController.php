<?php

namespace Modules\SliderManagement\App\Http\Controllers\Api\Dashboard;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Modules\SliderManagement\App\Http\Requests\Api\Dashboard\HeroRequestValidation;
use Modules\SliderManagement\App\Models\Slider;
use Modules\SliderManagement\App\Resources\Api\Dashboard\SliderResource;

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

    /**
     * Create new hero slider
     */
    public function store(HeroRequestValidation $request)
    {
        $data = $request->validated();
        $data['type'] = 'hero'; // Force type to hero
        
        // Handle background image upload
        if ($request->hasFile('background')) {
            $data['background'] = FileHelper::upload_file('uploads/sliders/hero', $data['background']);
        }
        
        // Set default order if not provided
        if (!isset($data['order'])) {
            $maxOrder = Slider::ofType('hero')->max('order') ?? 0;
            $data['order'] = $maxOrder + 1;
        }
        
        $heroSlider = Slider::create($data);
        return $this->sendResponse(new SliderResource($heroSlider), 'Hero slider created successfully');
    }

    /**
     * Update hero slider
     */
    public function update(HeroRequestValidation $request, $id)
    {
        $heroSlider = Slider::ofType('hero')->findOrFail($id);
        $data = $request->validated();
        
        // Handle background image update
        if ($request->hasFile('background')) {
            $data['background'] = FileHelper::update_file('uploads/sliders/hero', $data['background'], $heroSlider->background);
        }
        
        $heroSlider->update($data);
        return $this->sendResponse(new SliderResource($heroSlider), 'Hero slider updated successfully');
    }

    /**
     * Delete hero slider
     */
    public function destroy($id)
    {
        $heroSlider = Slider::ofType('hero')->findOrFail($id);
        
        // Delete background image
        FileHelper::delete_file($heroSlider->background);
        
        // Delete slider
        $heroSlider->delete();
        return $this->sendResponse([], 'Hero slider deleted successfully');
    }

    /**
     * Bulk delete hero sliders
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:sliders,id'
        ]);

        $heroSliders = Slider::ofType('hero')->whereIn('id', $request->ids)->get();
        
        foreach ($heroSliders as $heroSlider) {
            FileHelper::delete_file($heroSlider->background);
            $heroSlider->delete();
        }

        return $this->sendResponse([], 'Hero sliders deleted successfully');
    }

    /**
     * Reorder hero sliders
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'sliders' => 'required|array',
            'sliders.*.id' => 'required|exists:sliders,id',
            'sliders.*.order' => 'required|integer|min:0'
        ]);

        foreach ($request->sliders as $sliderData) {
            Slider::ofType('hero')
                  ->where('id', $sliderData['id'])
                  ->update(['order' => $sliderData['order']]);
        }

        return $this->sendResponse([], 'Hero sliders reordered successfully');
    }
}
