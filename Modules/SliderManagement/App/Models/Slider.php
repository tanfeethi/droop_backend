<?php

namespace Modules\SliderManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\SliderManagement\Database\factories\SliderFactory;

class Slider extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'type' => 'string',
        'order' => 'integer',
    ];

    /**
     * Slider types constants
     */
    const TYPE_HERO = 'hero';
    const TYPE_PROGRAM = 'program';

    /**
     * Get all available slider types
     */
    public static function getTypes()
    {
        return [
            self::TYPE_HERO => 'Hero Section',
            self::TYPE_PROGRAM => 'Program Section',
        ];
    }

    /**
     * Scope to filter sliders by type
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope to order sliders by order column
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    /**
     * Get the slider details for this slider.
     */
    public function details()
    {
        return $this->hasMany(SliderDetail::class)->ordered();
    }


    /**
     * The attributes that are mass assignable.
     */
    public function getBackgroundPathAttribute()
    {
        if (filter_var($this->attributes['background'], FILTER_VALIDATE_URL)) {
            // If the image is a valid URL, return it directly
            return $this->attributes['background'];
        } else {
            // If the image is not a URL, assume it's a file path and return it with the asset helper
            return url('storage/' . $this->attributes['background']);
        }
    }

    public function setTitleAttribute($title){  
        $this->attributes['title'] = json_encode($title);
    }

    public function setTextAttribute($text){
        $this->attributes['text'] = json_encode($text);
    }

    public function setBtnTitleAttribute($btn_title){
        $this->attributes['btn_title'] = json_encode($btn_title);
    }

    public function getTitleAttribute(){  
       return json_decode($this->attributes['title'],true);
    }

    public function getTextAttribute(){
        return json_decode($this->attributes['text'],true);
    }

    public function getBtnTitleAttribute(){
        return json_decode($this->attributes['btn_title'],true);
    }

      /**get columns translated regarding to language sent in header for frontend developers */
      public function getTitleTranslatedAttribute(){  
        return json_decode($this->attributes['title'],true)[app()->getLocale()];
     }
 
     public function getTextTranslatedAttribute(){
         return json_decode($this->attributes['text'],true)[app()->getLocale()];
     }

     public function getBtnTitleTranslatedAttribute(){
        return json_decode($this->attributes['btn_title'],true)[app()->getLocale()];
    }
     /**get columns translated regarding to language sent in header for frontend developers */
    
    protected static function newFactory(): SliderFactory
    {
        //return SliderFactory::new();
    }
}
