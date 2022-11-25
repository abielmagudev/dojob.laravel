<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiPlugin extends Model
{
    use HasFactory;

    protected $table = 'api_plugins';

    public function getThePriceAttribute()
    {
        return sprintf('$%s', $this->price);
    }

    public function catalog()
    {
        return $this->belongsTo(ApiCatalog::class, 'api_catalog_id');
    }

    public function isFree()
    {
        return is_null($this->price);
    }

    public function scopeWhereCatalog($query, $value, $column = 'api_catalog_id')
    {
        return $query->where($column, $value);
    }
}
