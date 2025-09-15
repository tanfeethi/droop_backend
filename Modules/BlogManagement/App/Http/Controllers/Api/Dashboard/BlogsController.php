<?php

namespace Modules\BlogManagement\App\Http\Controllers\Api\Dashboard;

use App\Helpers\FileHelper;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Modules\BlogManagement\App\Models\Blog;
use Modules\BlogManagement\App\resources\Api\BlogResource;
use Modules\BlogManagement\App\Http\Requests\Api\Dashboard\BlogRequestValidation;

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

    /**store method */
    public function store(BlogRequestValidation $request)
    {
        $data = $request->validated();
        $data['background'] = FileHelper::upload_file('uploads',  $data['background']);
        if(isset($data['cv'])){
            $data['cv'] = FileHelper::upload_file('uploads',  $data['cv']);
        }
        Blog::create($data);
        return $this->sendResponse([]);
    }

    /**update method */
    public function update(BlogRequestValidation $request, Blog $blog)
    {
        $data = $request->validated();
        if(isset($data['background'])){
            $data['background'] = FileHelper::update_file('uploads',$data['background'], $blog->background);
        }

        if(isset($data['cv'])){
            $data['cv'] = FileHelper::update_file('uploads',$data['cv'], $blog->cv);
        }

        $blog->update($data);
        return $this->sendResponse([]);
    }

    /**destroy method */
    public function destroy(Blog $blog){
        /**destroy icon */
        FileHelper::delete_file($blog->background);
        if(isset($blog->cv)){
            FileHelper::delete_file($blog->cv);
        }
        $blog->delete();
        return $this->sendResponse([]);
    }
}
