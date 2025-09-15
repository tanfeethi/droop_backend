<?php

namespace Modules\BlogManagement\App\Http\Controllers\Api\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\BlogManagement\App\Models\Blog;
use Modules\BlogManagement\App\resources\Api\BlogResource;

class BlogsController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $blogs = Blog::latest()->paginate();
        return $this->sendResponse(resource_collection(BlogResource::collection($blogs)));
    }
    public function show(Blog $blog)
    {
        return $this->sendResponse(new BlogResource($blog));
    }
}
