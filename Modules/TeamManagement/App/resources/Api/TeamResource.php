<?php

namespace Modules\TeamManagement\App\resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {

        return [
            'id' => $this->id,
            'name' => $this->name__translated,
            'position' => $this->position__translated,
            'text' => $this->text__translated,
            'image' => $this->image_path,
            'details' => $this->details_translated,
            'cv' => $this->cv_path,
        ];
    }
}
