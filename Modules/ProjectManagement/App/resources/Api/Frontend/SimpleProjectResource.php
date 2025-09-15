<?php

namespace Modules\ProjectManagement\App\resources\Api\Frontend;

use Illuminate\Http\Resources\Json\JsonResource;

class SimpleProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title_translated,
            'report' =>  $this->report ?   url('storage/' . $this->report) : null,
        ];
    }
}
