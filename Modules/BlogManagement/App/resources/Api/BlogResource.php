<?php

namespace Modules\BlogManagement\App\resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return[
            'id' => $this->id,
            'background' => $this->background_path,
            'title' => $this->title,
            'text' => $this->text,
            'status' => $this->status,
            'tags' => $this->tags,
            'details' => $this->details,
            'cv' => $this->cv_path,
       ];
    }
}
