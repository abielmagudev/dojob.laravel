<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'description',
        'enabled',
    ];

    public function scopeAllEnabled($query)
    {
        return $query->where('enabled', 1)->get();
    }

    public function operators()
    {
        return $this->hasMany(Operator::class);
    }

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function hasColor()
    {
        return (bool) preg_match('/^#[a-f0-9]{6}|[a-f0-9]{3}$/i', $this->color);
    }

    public function isEnabled()
    {
        return (bool) $this->enabled;
    }
}
