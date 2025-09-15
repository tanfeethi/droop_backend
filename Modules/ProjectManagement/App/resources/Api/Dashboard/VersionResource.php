<?php

namespace Modules\ProjectManagement\App\resources\Api\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class VersionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'version' => $this->version_translated,
        ];
    }
}
