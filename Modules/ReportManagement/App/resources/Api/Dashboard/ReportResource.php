<?php

namespace Modules\ReportManagement\App\resources\Api\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' =>$this->id,
            'name' => $this->name,
            'report' => $this->report_path,
            'type' => $this->type,
        ];
    }
}
