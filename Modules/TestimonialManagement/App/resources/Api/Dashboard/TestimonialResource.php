<?php

namespace Modules\TestimonialManagement\App\resources\Api\Dashboard;

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
            'name' => $this->name,
            'position' => $this->position,
            'text' => $this->text,
            'socialType' => $this->social_type,
            'socialUrl' => $this->social_url,
            'image' => $this->image_path,
            'date' => $this->created_at,
       ];
    }
}
