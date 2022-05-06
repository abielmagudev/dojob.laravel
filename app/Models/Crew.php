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

    public function hasColor()
    {
        return (bool) preg_match('/^#[a-f0-9]{6}|[a-f0-9]{3}$/i', $this->color);
    }

    public function isEnabled()
    {
        return (bool) $this->enabled;
    }
}
