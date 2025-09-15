<?php

namespace Modules\AreaManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\AreaManagement\Database\factories\AreaFactory;

class Area extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function setLocationAttribute($location){  
        $this->attributes['location'] = json_encode($location);
    }

    public function setDataAttribute($data){  
        $this->attributes['data'] = json_encode($data);
    }

    public function getLocationAttribute(){  
        return json_decode($this->attributes['location'],true);
     }
 
     public function getDataAttribute(){
         return json_decode($this->attributes['data'],true);
     }

     public function getLocationTranslatedAttribute(){
        return json_decode($this->attributes['location'],true)[app()->getLocale()];
     }

     public function getDataTranslatedAttribute(){
        $data =  json_decode($this->attributes['data'],true);
        $response = [];
        foreach($data as $dataObject){
            array_push($response,$dataObject[app()->getLocale()] );
        }
        return $response;
     }

    
    protected static function newFactory(): AreaFactory
    {
        //return AreaFactory::new();
    }
}
