<?php

namespace Modules\TrainerManagement\App\resources\Api\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class TrainerDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' =>$this->id,
            'name' => $this->name,
            'image' => $this->image_path,
            'address' =>$this->address,
            'filed' =>$this->filed,
            'trainee_count' =>$this->trainee_count,
            'program_count' =>$this->program_count,
            'hours_count' =>$this->hours_count,
            'hours_yafee_count' =>$this->hours_yafee_count,
            'cv' => $this->cv_path,
            'linkedin' =>$this->linkedin,
            'facebook' =>$this->facebook,
            'x' =>$this->x,
        ];
    }
}
