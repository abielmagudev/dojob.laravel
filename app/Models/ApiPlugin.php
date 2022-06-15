<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiPlugin extends Model
{
    use HasFactory;

    protected $table = 'api_plugins';

    public function catalog()
    {
        return $this->belongsTo(ApiCatalog::class, 'catalog_id');
    }

    public function isFree()
    {
        return (bool) $this->is_free;
    }
}
