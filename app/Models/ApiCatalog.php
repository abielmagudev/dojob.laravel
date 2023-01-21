<?php

namespace App\Models;

use App\Models\Extensions\HasExistence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ApiCatalog extends Model
{
    use HasExistence;

    protected $table = 'api_catalogs';
    
    // Attributes

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Str::title($value);
        $this->attributes['slug'] = Str::slug($value);
    }


    // Relations 

    public function plugins()
    {
        return $this->hasMany(ApiPlugin::class);
    }


    // Validations

    public function hasSlug($slug)
    {
        return $this->slug == $slug;
    }


    // Scopes

    public function scopeByName($query, string $name)
    {
        return $query->where('name', $name); 
    }


    // Statics
    
    public static function testNames()
    {
        return [
            'carpenter',
            'cleaning',
            'indoor gardening',
            'insulation',
            'outdoor gardening',
            'painting',
        ];
    }
}
