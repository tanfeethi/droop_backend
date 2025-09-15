<?php

namespace Modules\SliderManagement\App\Http\Controllers\Api\Dashboard;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Modules\SliderManagement\App\Http\Requests\Api\Dashboard\SliderDetailRequestValidation;
use Modules\SliderManagement\App\Models\Slider;
use Modules\SliderManagement\App\Models\SliderDetail;
use Modules\SliderManagement\App\Resources\Api\Dashboard\SliderDetailResource;

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
     * Store new program slider detail
     */
    public function store(SliderDetailRequestValidation $request)
    {
        $data = $request->validated();
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = FileHelper::upload_file('uploads/slider-details', $data['image']);
        }
        
        // Set default order if not provided
        if (!isset($data['order'])) {
            $maxOrder = SliderDetail::where('slider_id', $data['slider_id'])->max('order') ?? 0;
            $data['order'] = $maxOrder + 1;
        }
        
        $detail = SliderDetail::create($data);
        return $this->sendResponse(new SliderDetailResource($detail), 'Program detail created successfully');
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

    /**
     * Update program slider detail
     */
    public function update(SliderDetailRequestValidation $request, $id)
    {
        $detail = SliderDetail::whereHas('slider', function($query) {
            $query->ofType(Slider::TYPE_PROGRAM);
        })->findOrFail($id);
        
        $data = $request->validated();
        
        // Handle image update
        if ($request->hasFile('image')) {
            $data['image'] = FileHelper::update_file('uploads/slider-details', $data['image'], $detail->image);
        }
        
        $detail->update($data);
        return $this->sendResponse(new SliderDetailResource($detail), 'Program detail updated successfully');
    }

    /**
     * Delete program slider detail
     */
    public function destroy($id)
    {
        $detail = SliderDetail::whereHas('slider', function($query) {
            $query->ofType(Slider::TYPE_PROGRAM);
        })->findOrFail($id);
        
        // Delete image
        FileHelper::delete_file($detail->image);
        
        $detail->delete();
        return $this->sendResponse([], 'Program detail deleted successfully');
    }

    /**
     * Bulk delete program slider details
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:slider_details,id'
        ]);

        $details = SliderDetail::whereHas('slider', function($query) {
            $query->ofType(Slider::TYPE_PROGRAM);
        })->whereIn('id', $request->ids)->get();
        
        foreach ($details as $detail) {
            FileHelper::delete_file($detail->image);
            $detail->delete();
        }

        return $this->sendResponse([], 'Program details deleted successfully');
    }

    /**
     * Reorder program slider details
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'details' => 'required|array',
            'details.*.id' => 'required|exists:slider_details,id',
            'details.*.order' => 'required|integer|min:0'
        ]);

        foreach ($request->details as $detailData) {
            SliderDetail::whereHas('slider', function($query) {
                $query->ofType(Slider::TYPE_PROGRAM);
            })->where('id', $detailData['id'])
              ->update(['order' => $detailData['order']]);
        }

        return $this->sendResponse([], 'Program details reordered successfully');
    }
}
