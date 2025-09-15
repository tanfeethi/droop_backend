<?php

namespace Modules\TwitterIntefrationManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\TwitterIntefrationManagement\Database\factories\TwitterFactory;

class Twitter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];
    
    protected static function newFactory(): TwitterFactory
    {
        //return TwitterFactory::new();
    }
}
