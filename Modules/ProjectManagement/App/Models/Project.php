<?php

namespace Modules\ProjectManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\TrainerManagement\App\Models\Trainer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\ProjectManagement\Database\factories\ProjectFactory;

class Project extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     */

     /**
     * The attributes that are mass assignable.
     */
    public function getThumbnailPathAttribute()
    {
        if (filter_var($this->attributes['thumbnail'], FILTER_VALIDATE_URL)) {
            // If the image is a valid URL, return it directly
            return $this->attributes['thumbnail'];
        } else {
            // If the image is not a URL, assume it's a file path and return it with the asset helper
            return url('storage/' . $this->attributes['thumbnail']);
        }
    }
    

    public function setTitleAttribute($title){  
        $this->attributes['title'] = json_encode($title);
    }

    public function setTextAttribute($text){
        $this->attributes['text'] = json_encode($text);
    }

    public function setTagsAttribute($tags){
        $this->attributes['tags'] = json_encode($tags);
    }

    public function setVersionAttribute($version){
        $this->attributes['version'] = json_encode($version);
    }

    public function getTitleAttribute(){
       return json_decode($this->attributes['title'],true);
    }

    public function getTextAttribute(){
        return json_decode($this->attributes['text'],true);
    }

    public function getTagsAttribute(){
        return json_decode($this->attributes['tags'],true);
    }

    public function getVersionAttribute(){
        return json_decode($this->attributes['version'],true);
    }

    /**get columns translated regarding to language sent in header for frontend developers */
    public function getTitleTranslatedAttribute(){  
        return json_decode($this->attributes['title'],true)[app()->getLocale()];
     }
 
     public function getTextTranslatedAttribute(){
         return json_decode($this->attributes['text'],true)[app()->getLocale()];
     }

     public function getVersionTranslatedAttribute(){
        return json_decode($this->attributes['version'],true)[app()->getLocale()] ?? "";
    }
     /**get columns translated regarding to language sent in header for frontend developers */

   
    
    protected static function newFactory(): ProjectFactory
    {
        //return ProjectFactory::new();
    }

    public function trainers(){
        return $this->belongsToMany(Trainer::class,'project_trainers');
    }

    public function managers(){
        return $this->hasMany(ProjectManager::class);
    }

    public function versions(){
        return $this->hasMany(Project::class,'parent_id','id');
    }

  
    
}
