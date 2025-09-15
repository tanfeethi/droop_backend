<?php

namespace Modules\SliderManagement\App\Resources\Api\Frontend;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title_translated ?? '',
            'description' => $this->description_translated ?? '',
            'image' => $this->image_path ?? '',
            'order' => $this->order ?? 0,
        ];
    }
}