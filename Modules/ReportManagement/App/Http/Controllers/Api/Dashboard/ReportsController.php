<?php

namespace Modules\ReportManagement\App\Http\Controllers\Api\Dashboard;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\ReportManagement\App\Http\Requests\Api\Dashboard\CreateReportRequest;
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
        $trainers = Report::all();
        return $this->sendResponse([ReportResource::collection($trainers)]);
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
    public function store(CreateReportRequest $request)
    {
        $data = $request->validated();
        $data['report'] = FileHelper::upload_file('uploads/reports',  $data['report']);
        Report::create($data);
        return $this->sendResponse([]);
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
    public function update(CreateReportRequest $request,Report $report)
    {
        $data = $request->validated();

        if(isset($data['report'])){
            $data['report'] = FileHelper::update_file('uploads/reports',$data['report'], $report->report);
        }
        $report->update($data);

        return $this->sendResponse([new ReportResource($report)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        /**destroy fails */
        FileHelper::delete_file($report->report);

        /**destroy service */
        $report->delete();
        return $this->sendResponse([]);
    }
}
