<?php

namespace Modules\ProjectManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ProjectManagement\Database\factories\ProjectManagerFactory;

class ProjectManager extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function setNameAttribute($name){  
        $this->attributes['name'] = json_encode($name);
    }

    public function setPositionAttribute($position){
        $this->attributes['position'] = json_encode($position);
    }



    public function getNameAttribute(){
       return json_decode($this->attributes['name'],true);
    }

    public function getPositionAttribute(){
        return json_decode($this->attributes['position'],true);
    }



    /**get columns translated regarding to language sent in header for frontend developers */
    public function getNameTranslatedAttribute(){  
        return json_decode($this->attributes['name'],true)[app()->getLocale()];
     }
 
     public function getPositionTranslatedAttribute(){
         return json_decode($this->attributes['position'],true)[app()->getLocale()];
     }
     /**get columns translated regarding to language sent in header for frontend developers */
    
    protected static function newFactory(): ProjectManagerFactory
    {
        //return ProjectManagerFactory::new();
    }
}
