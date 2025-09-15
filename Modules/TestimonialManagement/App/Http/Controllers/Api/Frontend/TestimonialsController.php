<?php

namespace Modules\TestimonialManagement\App\Http\Controllers\Api\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\TestimonialManagement\App\Models\Testimonial;
use Modules\SliderManagement\App\resources\Api\SliderResource;
use Modules\TestimonialManagement\App\resources\Api\Frontend\TestimonialResource;

class TestimonialsController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $testimonials = Testimonial::get();
        return $this->sendResponse(TestimonialResource::collection($testimonials));
    }

}
