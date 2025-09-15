<?php

namespace Modules\SettingManagement\App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use Modules\SettingManagement\App\Http\Requests\Api\Dashboard\UpdatNavbarRequest;
use Modules\SettingManagement\App\Models\Navbar;
use Modules\SettingManagement\App\resources\Api\Dashboard\NavbarResource;

class NavBarController extends Controller
{
    use ApiResponseTrait;
    public function list(){
        $rows = Navbar::all();
        return $this->sendResponse(NavbarResource::collection($rows));
    }
    public function update(UpdatNavbarRequest $request,$id){

        $data = $request->validated();
        Navbar::where('id',$id)->update($data);
        Artisan::call('config:cache');
        return $this->sendResponse([]);
    }
}
