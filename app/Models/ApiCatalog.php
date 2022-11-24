<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Ahex\Zkaffold\Domain\HasExistence;

class ApiCatalog extends Model
{
    use HasExistence;

    protected $table = 'api_catalogs';
    
    public function plugins()
    {
        return $this->hasMany(ApiPlugin::class);
    }

    public function scopeByName($query, string $name)
    {
        return $query->where('name', $name); 
    }
}
