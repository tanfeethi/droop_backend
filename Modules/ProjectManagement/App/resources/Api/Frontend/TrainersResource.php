<?php

namespace Modules\ProjectManagement\App\resources\Api\Frontend;

use Illuminate\Http\Resources\Json\JsonResource;

class TrainersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
