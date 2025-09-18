<?php

namespace Modules\TestimonialManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\TestimonialManagement\Database\factories\TestimonialFactory;
use App\Traits\HasImageUrl;

class Testimonial extends Model
{
    use HasFactory, HasImageUrl;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

     /**
     * The attributes that are mass assignable.
     */

    public function setNameAttribute($name){  
        $this->attributes['name'] = json_encode($name);
    }

    public function setTextAttribute($text){
        $this->attributes['text'] = json_encode($text);
    }

    public function setPositionAttribute($position){
        $this->attributes['position'] = json_encode($position);
    }

    public function getNameAttribute(){  
       return json_decode($this->attributes['name'],true);
    }

    public function getTextAttribute(){
        return json_decode($this->attributes['text'],true);
    }

    public function getPositionAttribute(){
        return json_decode($this->attributes['position'],true);
    }

      /**get columns translated regarding to language sent in header for frontend developers */
      public function getNameTranslatedAttribute(){  
        return json_decode($this->attributes['name'],true)[app()->getLocale()];
     }
 
     public function getTextTranslatedAttribute(){
         return json_decode($this->attributes['text'],true)[app()->getLocale()];
     }

     public function getPositionTranslatedAttribute(){
        return json_decode($this->attributes['position'],true)[app()->getLocale()];
    }
     /**get columns translated regarding to language sent in header for frontend developers */
    
    protected static function newFactory(): TestimonialFactory
    {
        //return TestimonialFactory::new();
    }
}
