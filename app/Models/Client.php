<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'name',
        'lastname',
        'alias',
        'address',
        'zip_code',
        'city',
        'state',
        'country',
        'phone',
        'email',
        'notes',
    ];

    public function getFullnameAttribute()
    {
        return "{$this->name} {$this->lastname}";
    }

    public function getLocationAttribute()
    {
        return "{$this->city}, {$this->state}, {$this->country}";
    }

    public function works()
    {
        return $this->hasMany(Work::class);
    }
}
