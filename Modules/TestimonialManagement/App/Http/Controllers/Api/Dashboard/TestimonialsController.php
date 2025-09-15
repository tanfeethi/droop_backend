<?php

namespace Modules\TestimonialManagement\App\Http\Controllers\Api\Dashboard;

use App\Helpers\FileHelper;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Modules\TestimonialManagement\App\Models\Testimonial;
use Modules\TestimonialManagement\App\resources\Api\Dashboard\TestimonialResource;
use Modules\TestimonialManagement\App\Http\Requests\Api\Dashboard\TestimonialRequestValidation;

class TestimonialsController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $services = Testimonial::get();
        return $this->sendResponse(TestimonialResource::collection($services));
    }

    public function show(Testimonial $testimonial)
    {
        return $this->sendResponse(new TestimonialResource($testimonial));
    }

    /**store method */
    public function store(TestimonialRequestValidation $request)
    {
        $data = $request->validated();
        $data['image'] = FileHelper::upload_file('uploads',  $data['image']);
        Testimonial::create($data);
        return $this->sendResponse([]);
    }

    /**update method */
    public function update(TestimonialRequestValidation $request, Testimonial $testimonial)
    {
        $data = $request->validated();
        if(isset($data['image'])){
            $data['image'] = FileHelper::update_file('uploads',$data['image'], $testimonial->image);
        };
       $testimonial->update($data);
        return $this->sendResponse([]);
    }

    /**destroy method */
    public function destroy(Testimonial $testimonial){
        /**destroy icon */
        FileHelper::delete_file($testimonial->image);
        $testimonial->delete();
        return $this->sendResponse([]);
    }
}
