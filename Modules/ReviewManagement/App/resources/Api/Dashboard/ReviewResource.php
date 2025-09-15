<?php

namespace Modules\ReviewManagement\App\resources\Api\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return[
            'id' => $this->id,
            'name' => $this->name,
            'link' => $this->link,
            'image' => $this->image_path,
            'text' => $this->text,
       ];
    }
}
