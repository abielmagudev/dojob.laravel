<?php

namespace App\Models;

use App\Ahex\Zkaffold\Domain\HasExistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Intermediary extends Model
{
    use HasExistence,
        HasFactory,
        SoftDeletes;

    protected $fillable = [
        'name',
        'alias',
        'contact',
        'phone',
        'email',
        'notes',
        'is_available',
    ];

    public function scopeOnlyAvailable($query)
    {
        return $query->where('is_available', true);
    }

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function isAvailable()
    {
        return (bool) $this->is_available;
    }

    public static function generateAlias(string $name)
    {
        preg_match_all('/\b(\w)/', strtoupper($name), $words);
        return implode('', $words[1]);
    }
}
