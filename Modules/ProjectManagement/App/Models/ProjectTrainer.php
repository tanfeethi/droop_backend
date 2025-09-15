<?php

namespace Modules\ProjectManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ProjectManagement\Database\factories\ProjectTrainerFactory;

class ProjectTrainer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];
    
    protected static function newFactory(): ProjectTrainerFactory
    {
        //return ProjectTrainerFactory::new();
    }
}
