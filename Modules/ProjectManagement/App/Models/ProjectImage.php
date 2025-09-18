<?php

namespace Modules\ProjectManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ProjectManagement\Database\factories\ProjectImageFactory;
use App\Traits\HasImageUrl;

class ProjectImage extends Model
{
    use HasFactory, HasImageUrl;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    
    protected static function newFactory(): ProjectImageFactory
    {
        //return ProjectImageFactory::new();
    }
}
