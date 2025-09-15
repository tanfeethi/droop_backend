<?php

namespace Modules\ReportManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ReportManagement\Database\factories\ReportFactory;

class Report extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function getReportPathAttribute()
    {
        if (filter_var($this->attributes['report'], FILTER_VALIDATE_URL)) {
            // If the image is a valid URL, return it directly
            return $this->attributes['report'];
        } else {
            // If the image is not a URL, assume it's a file path and return it with the asset helper
            return url('storage/' . $this->attributes['report']);
        }
    }

    protected static function newFactory(): ReportFactory
    {
        //return ReportFactory::new();
    }
}
