<?php

namespace Modules\AdminManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\AdminManagement\Database\factories\AdminFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Traits\HasImageUrl;

class Admin extends Authenticatable implements JWTSubject
{
    use HasFactory, HasImageUrl;



    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    /**
     * JWT: Get the identifier for the token.
     */
    public function getJWTIdentifier()
    {
        return $this->getKey(); // عادةً ما يكون المعرف هو الـ ID
    }

    /**
     * JWT: Get custom claims for the token.
     */
    public function getJWTCustomClaims()
    {
        return []; // يمكن إضافة أي بيانات إضافية تحتاجها هنا
    }

    /**
     * Factory for Admin.
     */
    protected static function newFactory(): AdminFactory
    {
        // Uncomment if you have a factory for Admin.
        // return AdminFactory::new();
    }
}
