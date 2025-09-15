<?php

namespace Modules\SliderManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SliderDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'order' => 'integer',
    ];

    /**
     * Get the slider that owns the detail.
     */
    public function slider()
    {
        return $this->belongsTo(Slider::class);
    }

    /**
     * Scope to order details by order column.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    /**
     * Get translated title based on current locale.
     */
    public function getTitleTranslatedAttribute()
    {
        return $this->title[app()->getLocale()] ?? $this->title['en'] ?? '';
    }

    /**
     * Get translated description based on current locale.
     */
    public function getDescriptionTranslatedAttribute()
    {
        return $this->description[app()->getLocale()] ?? $this->description['en'] ?? '';
    }

    /**
     * Get image path attribute.
     */
    public function getImagePathAttribute()
    {
        if (filter_var($this->attributes['image'], FILTER_VALIDATE_URL)) {
            return $this->attributes['image'];
        } else {
            return url('storage/' . $this->attributes['image']);
        }
    }
}
