<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

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
        return implode(' ', [
            $this->name,
            $this->lastname,
        ]);
    }

    public function getResidenceAttribute()
    {
        return implode(' ', [
            $this->address,
            $this->zip_code,
        ]);
    }

    public function getLocationAttribute()
    {
        return implode(', ', [
            $this->city ?? '...?',
            $this->state ?? '...?',
            $this->country ?? '...?',
        ]);
    }

    public function getContactAttribute()
    {
        return implode(' ', [
            $this->phone,
            $this->email,
        ]);
    }

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function hasAlias()
    {
        return isset($this->alias);
    }
    
    public function hasWorks()
    {
        return (bool) $this->works->count();
    }
}
