<?php

namespace Modules\SliderManagement\App\Resources\Api\Dashboard;

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
            'slider_id' => $this->slider_id,
            'title' => $this->title ?? [],
            'description' => $this->description ?? [],
            'image' => $this->image_path ?? '',
            'order' => $this->order ?? 0,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}