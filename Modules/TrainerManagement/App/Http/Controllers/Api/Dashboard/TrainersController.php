<?php

namespace Modules\TrainerManagement\App\Http\Controllers\Api\Dashboard;

use App\Helpers\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\TrainerManagement\App\Models\Trainer;
use Modules\TrainerManagement\App\resources\Api\Dashboard\TrainerResource;
use Modules\TrainerManagement\App\resources\Api\Dashboard\TrainerDetailResource;
use Modules\TrainerManagement\App\Http\Requests\Api\Dashboard\TrainerRequestValiation;

class TrainersController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers = Trainer::latest()->paginate();
        return $this->sendResponse(resource_collection(TrainerResource::collection($trainers)));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trainermanagement::create');
    }

    /**
    * Store a newly created resource in storage.
    */
    public function store(TrainerRequestValiation $request)
    {
        $data = $request->validated();
        $data['image'] = FileHelper::upload_file('uploads',  $data['image']);
        $data['cv'] = FileHelper::upload_file('uploads',  $data['cv']);
        Trainer::create($data);
        return $this->sendResponse([]);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $trainer = Trainer::find($id);
        return $this->sendResponse([new TrainerDetailResource($trainer)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('trainermanagement::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrainerRequestValiation $request,Trainer $trainer)
    {
        $data = $request->validated();
        if(isset($data['image'])){
            $data['image'] = FileHelper::update_file('uploads',$data['image'], $trainer->image);
        }
        if(isset($data['cv'])){
            $data['cv'] = FileHelper::update_file('uploads',$data['cv'], $trainer->cv);
        }
        $trainer->update($data);

        return $this->sendResponse([new TrainerDetailResource($trainer)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trainer $trainer)
    {
        /**destroy fails */
        FileHelper::delete_file($trainer->image);
        FileHelper::delete_file($trainer->cv);

        /**destroy service */
        $trainer->delete();
        return $this->sendResponse([]);
    }
}
