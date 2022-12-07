<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ApiPlugin extends Model
{
    use HasFactory;

    protected $table = 'api_plugins';

    
    // Attributes

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value; // Str::title($value)
        $this->attributes['directory'] = Str::camel($value);
        $this->attributes['hashed'] = Str::random( strlen($value) );
    }

    public function getThePriceAttribute()
    {
        return sprintf('$%s', $this->price);
    }


    // Relations

    public function catalog()
    {
        return $this->belongsTo(ApiCatalog::class, 'api_catalog_id');
    }


    // Validations

    public function isFree()
    {
        return is_null($this->price);
    }


    // Scopes

    public function scopeWhereCatalog($query, $value, $column = 'api_catalog_id')
    {
        return $query->where($column, $value);
    }

    
    // Statics

    public static function testNames()
    {
        return [
            'Predective maintenance' => 'Review and approval of the work done',
            'Preventive maintenance' => 'Keeps work done in good condition',
            'Corrective maintenance' => 'Correct the error or several errors of a work done',
        ];
    }
}
