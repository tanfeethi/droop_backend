<?php

namespace Modules\CoachManagment\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CoachManagment\Database\factories\CoachFactory;

class Coach extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): CoachFactory
    {
        //return CoachFactory::new();
    }
}
