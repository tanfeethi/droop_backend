<?php

namespace Modules\TestimonialManagement\App\resources\Api\Frontend;

use Illuminate\Http\Resources\Json\JsonResource;

class TestimonialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return[
            'id' => $this->id,
            'name' => $this->name_translated,
            'position' => $this->position_translated,
            'text' => $this->text_translated,
            'socialType' => $this->social_type,
            'socialType' => $this->social_url,
            'image' => $this->image_path
       ];
    }
}
