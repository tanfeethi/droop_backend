<?php

namespace Modules\SettingManagement\App\resources\Api\Dashboard;

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
            "title" => $this->title,
            "parent" => $this->parent->title_translated ?? null
        ];
    }
}
