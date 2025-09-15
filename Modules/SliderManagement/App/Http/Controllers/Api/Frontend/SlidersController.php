<?php

namespace Modules\SliderManagement\App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\SliderManagement\App\Models\Slider;
use Modules\SliderManagement\App\Resources\Api\SliderResource;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('slidermanagement::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $service = Slider::findOrFail($id);
        return $this->sendResponse(SliderResource::collection([$service]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('slidermanagement::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
