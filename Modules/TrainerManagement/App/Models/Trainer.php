<?php

namespace Modules\TrainerManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\TrainerManagement\Database\factories\TrainerFactory;
use App\Traits\HasImageUrl;

class Trainer extends Model
{
    use HasFactory, HasImageUrl;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];


    protected static function newFactory(): TrainerFactory
    {
        //return TrainerFactory::new();
    }
}
