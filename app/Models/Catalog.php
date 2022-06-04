<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Ahex\Zkaffold\Domain\HasExistence;

class Catalog extends Model
{
    use HasExistence;

    public function plugins()
    {
        return $this->hasMany(Plugin::class);
    }

    public function scopeByName($query, string $catalog_name)
    {
        return $query->where('name', $catalog_name); 
    }
}
