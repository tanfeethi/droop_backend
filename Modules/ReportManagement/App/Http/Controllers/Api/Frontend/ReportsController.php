<?php

namespace Modules\ReportManagement\App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\ReportManagement\App\Models\Report;
use Modules\ReportManagement\App\resources\Api\Dashboard\ReportResource;

class ReportsController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers = Report::latest()->paginate();
        return $this->sendResponse(resource_collection(ReportResource::collection($trainers)));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reportmanagement::create');
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
        $report = Report::find($id);
        return $this->sendResponse([new ReportResource($report)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('reportmanagement::edit');
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
