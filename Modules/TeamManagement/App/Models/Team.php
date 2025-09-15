<?php

namespace Modules\TeamManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\TeamManagement\Database\factories\TeamFactory;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImagePathAttribute()
    {
        if (filter_var($this->attributes['image'], FILTER_VALIDATE_URL)) {
            // If the image is a valid URL, return it directly
            return $this->attributes['image'];
        } else {
            // If the image is not a URL, assume it's a file path and return it with the asset helper
            return url('storage/' . $this->attributes['image']);
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

    public function setNameAttribute($name){
        $this->attributes['name'] = json_encode($name);
    }

    public function setDetailsAttribute($details){
        $this->attributes['details'] = json_encode($details);
    }

    public function setPositionAttribute($position){
        $this->attributes['position'] = json_encode($position);
    }

    public function setTextAttribute($text){
        $this->attributes['text'] = json_encode($text);
    }


    public function getTextAttribute(){
        return json_decode($this->attributes['text'],true);
    }


    public function getNameAttribute(){
       return json_decode($this->attributes['name'],true);
    }

    public function getPositionAttribute(){
        return json_decode($this->attributes['position'],true);
    }

    public function getDetailsAttribute(){
        return json_decode($this->attributes['details'],true);
    }

    /**get columns translated regarding to language sent in header for frontend developers */
    public function getNameTranslatedAttribute(){
        return json_decode($this->attributes['name'],true)[app()->getLocale()];
    }

    public function getPositionTranslatedAttribute(){
        return json_decode($this->attributes['position'],true)[app()->getLocale()];
    }

    public function getTextTranslatedAttribute(){
        return json_decode($this->attributes['text'],true)[app()->getLocale()];

    }

    public function getDetailsTranslatedAttribute(){
        return json_decode($this->attributes['details'],true)[app()->getLocale()];
    }
    /**get columns translated regarding to language sent in header for frontend developers */

    protected static function newFactory(): TeamFactory
    {
        //return TeamFactory::new();
    }
}
