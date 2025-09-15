<?php

namespace Modules\TrainerManagement\App\resources\Api\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class TrainerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' =>$this->id,
            'name' => $this->name,
            'address' =>$this->address,
            'filed' =>$this->filed,
        ];
    }
}
