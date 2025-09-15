<?php

namespace Modules\BlogManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\BlogManagement\Database\factories\BlogFactory;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

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

    public function getCvPathAttribute()
    {
        if (filter_var($this->attributes['cv'], FILTER_VALIDATE_URL)) {
            // If the image is a valid URL, return it directly
            return $this->attributes['cv'];
        } else {
            // If the image is not a URL, assume it's a file path and return it with the asset helper
            return url('storage/' . $this->attributes['cv']);
        }
    }

    public function setTitleAttribute($title){
        $this->attributes['title'] = json_encode($title);
    }

    public function setDetailsAttribute($details){
        $this->attributes['details'] = json_encode($details);
    }

    public function setTextAttribute($text){
        $this->attributes['text'] = json_encode($text);
    }

    public function setTagsAttribute($tags){
        $this->attributes['tags'] = json_encode($tags);
    }


    public function getTitleAttribute(){
       return json_decode($this->attributes['title'],true);
    }

    public function getDetailsAttribute(){
        return json_decode($this->attributes['details'],true);
    }

    public function getTextAttribute(){
        return json_decode($this->attributes['text'],true);
    }

    public function getTagsAttribute(){
        return json_decode($this->attributes['tags'],true);
    }



    /**get columns translated regarding to language sent in header for frontend developers */
    public function getTitleTranslatedAttribute(){
        return json_decode($this->attributes['title'],true)[app()->getLocale()];
    }

    public function getTextTranslatedAttribute(){
         return json_decode($this->attributes['text'],true)[app()->getLocale()];
    }

    public function getDetailsTranslatedAttribute(){
        return json_decode($this->attributes['details'],true)[app()->getLocale()];
    }


    protected static function newFactory(): BlogFactory
    {
        //return BlogFactory::new();
    }
}
