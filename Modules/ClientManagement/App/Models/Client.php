<?php
namespace Modules\ClientManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ClientManagement\Database\factories\ClientFactory;
use App\Traits\HasImageUrl;

class Client extends Model
{
    use HasFactory, HasImageUrl;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];
    
    
    protected static function newFactory(): ClientFactory
    {
        //return ClientFactory::new();
    }
}
