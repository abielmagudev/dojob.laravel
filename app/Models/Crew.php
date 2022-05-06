<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'color',
        'disabled',
    ];

    public function hasColor()
    {
        return preg_match('/^#[a-f0-9]{6}|[a-f0-9]{3}$/i', $this->color);
    }

    public function isDisabled()
    {
        return (bool) $this->disabled;
    }

    public function isAvailable()
    {
        return ! $this->isDisabled();
    }
}
