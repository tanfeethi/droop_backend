<?php

namespace Modules\SettingManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\SettingManagement\Database\factories\NavbarFactory;

class Navbar extends Model
{
    use HasFactory;

    protected $table='navbar';
    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function setTitleAttribute($title){
        $this->attributes['title'] = json_encode($title);
    }

    public function getTitleAttribute(){
        return json_decode($this->attributes['title'],true);
    }

    /**get columns translated regarding to language sent in header for frontend developers */
    public function getTitleTranslatedAttribute(){
        return json_decode($this->attributes['title'],true)[app()->getLocale()];
    }

    public function parent(){
        return $this->belongsTo(Navbar::class,'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Navbar::class, 'parent_id');
    }

    protected static function newFactory(): NavbarFactory
    {
        //return NavbarFactory::new();
    }
}
