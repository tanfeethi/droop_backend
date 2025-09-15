<?php

namespace Modules\SettingManagement\App\resources\Api\Frontend;

use Illuminate\Http\Resources\Json\JsonResource;

class NavbarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "title" => $this->title_translated,
            "sub_list" => NavbarResource::collection($this->children)?? null
        ];
    }
}
