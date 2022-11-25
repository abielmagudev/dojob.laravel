<?php

namespace App\Models;

use App\Ahex\Zkaffold\Domain\HasExistence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ApiCatalog extends Model
{
    use HasExistence;

    protected $table = 'api_catalogs';
    
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Str::title($value);
        $this->attributes['slug'] = Str::slug($value);
    }

    public function plugins()
    {
        return $this->hasMany(ApiPlugin::class);
    }

    public function hasSlug($slug)
    {
        return $this->slug == $slug;
    }

    public function scopeByName($query, string $name)
    {
        return $query->where('name', $name); 
    }

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
