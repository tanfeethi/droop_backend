<?php

namespace Modules\ProjectManagement\App\resources\Api\Frontend;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title_translated,
            'text' => $this->text_translated,
            'numberOfBeneficiaries' => $this->number_of_beneficiaries,
            'version' => $this->version_translated,
            'tags' => $this->tags,
            'thumbnail' => $this->thumbnail_path,
            'versions' => VersionResource::collection($this->versions),
            'managers' =>  ManagerResource::collection($this->managers()->orderBy('arrange','asc')->get()),
            'trainers' =>  TrainersResource::collection($this->trainers),
            'type' => $this->type,
            'report' => $this->report ?   url('storage/' . $this->report) : null,
        ];
    }
}
