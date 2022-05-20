<?php

namespace App\Models;

use App\Ahex\Zkaffold\Domain\HasExistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intermediary extends Model
{
    use HasExistence, HasFactory;

    protected $fillable = [
        'name',
        'alias',
        'contact',
        'phone',
        'email',
        'notes',
        'available',
    ];

    public function scopeOnlyAvailable($query)
    {
        return $query->where('available', true);
    }

    public function isAvailable()
    {
        return (bool) $this->available;
    }

    public static function generateAlias(string $name)
    {
        preg_match_all('/\b(\w)/', strtoupper($name), $words);
        return implode('', $words[1]);
    }
}
