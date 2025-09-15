<?php

namespace Modules\SliderManagement\App\Resources\Api\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'order' => $this->order,
            'background' => $this->background_path,
            'title' => $this->title,
            'text' => $this->text,
            'btnTitle' => $this->btn_title,
            'btnUrl' => $this->btn_url,
            'btnActive' => $this->btn_active,
            'details' => $this->when($this->type === 'program', SliderDetailResource::collection($this->details)),
        ];
    }
}