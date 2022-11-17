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

    public function getNameWithAliasAttribute()
    {
        return implode(' ', [
            $this->name,
            "({$this->alias})"
        ]);
    }

    public function getToContactAttribute()
    {
        return implode(' | ', [
            $this->contact,
            $this->phone,
            $this->email
        ]);
    }

    public function getContactMeansAttribute()
    {
        return implode(' | ', [
            $this->phone,
            $this->email
        ]);
    }

    /**
    * Get the full name through the user
    */
    public function getFullnameAttribute()
    {
        return $this->nameWithAlias;
    }


    // Scopes

    public function scopeOnlyAvailable($query)
    {
        return $query->where('is_available', true);
    }


    // Relations

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function user()
    {
        return $this->morphOne(User::class, 'profilable');
    }


    // Validations

    public function isAvailable()
    {
        return (bool) $this->is_available;
    }

    public function hasNotes()
    {
        return isset($this->notes);
    }


    // Statics

    public static function generateAlias(string $name)
    {
        preg_match_all('/\b(\w)/', strtoupper($name), $words);
        return implode('', $words[1]);
    }
}
