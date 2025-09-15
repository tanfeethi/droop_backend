<?php

namespace Modules\TrainerManagement\App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\TrainerManagement\App\Models\Trainer;
use Modules\TrainerManagement\App\resources\Api\Dashboard\TrainerDetailResource;
use Modules\TrainerManagement\App\resources\Api\Dashboard\TrainerResource;

class TrainersController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers = Trainer::all();
        return $this->sendResponse([TrainerResource::collection($trainers)]);
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
    public function store(Request $request): RedirectResponse
    {
        //
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
