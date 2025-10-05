<?php

namespace Modules\CoachManagment\App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\CoachManagment\App\Emails\CoachJoinEmail;
use Modules\CoachManagment\App\Http\Requests\Frontend\CoachJoinRequest;

class CoachesController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('coachmanagment::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('coachmanagment::create');
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
        return view('coachmanagment::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('coachmanagment::edit');
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

    /**
     * Handle coach join request (no DB). Sends email to main contact.
     */
    public function join(CoachJoinRequest $request)
    {
        $details = $request->validated();
        try {
            Mail::to(config('constant.contactEmail'))
                ->send(new CoachJoinEmail($details));
            return $this->sendResponse([[ 'message' => 'Email sent successfully!' ]], 'Email sent successfully!', 200);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 400);
        }
    }
}
