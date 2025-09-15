<?php

namespace Modules\ProjectManagement\App\resources\Api\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class ManagerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name_translated,
            'position' => $this->position_translated,
        ];
    }
}
