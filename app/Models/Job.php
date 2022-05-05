<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'available',
    ];

    public function isAvailable()
    {
        return (bool) $this->available;
    }

    public function isNotAvailable()
    {
        return ! $this->isAvailable();
    }
}
