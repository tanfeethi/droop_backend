<?php

namespace Modules\AreaManagement\App\resources\Api\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class AreaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'location' => $this->location,
            'numberOfProjects' => $this->number_of_projects,
            'numberOfBeneficiaries' => $this->number_of_beneficiaries,
            'numberOfPrograms' => $this->number_of_programs,
        ] ;
    }
}
