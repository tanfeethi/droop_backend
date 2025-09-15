<?php
namespace Modules\AreaManagement\App\Http\Controllers\Api\Frontend;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Modules\AreaManagement\App\Models\Area;
use Modules\AreaManagement\App\resources\Api\Frontend\AreaResource;
class AreasController extends Controller
{
   use ApiResponseTrait;
   public function index(){
      $areas = Area::get();
      $totalProjects = Area::sum('number_of_projects');
      $totalBeneficiaries = Area::sum('number_of_beneficiaries');
      $totalPrograms = Area::sum('number_of_programs');
      $data = [
         'totalProjects' => $totalProjects,
         'totalBeneficiaries' =>$totalBeneficiaries,
         'totalPrograms' =>$totalPrograms,
         'areas' => AreaResource::collection($areas)
      ];

      return $this->sendResponse($data);
   }
}
