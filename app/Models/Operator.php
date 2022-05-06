<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    const UNCREWED = false;

    protected $fillable = [
        'name',
        'lastname',
        'phone',
        'email',
        'birthdate',
        'notes',
    ];

    public function getFullnameAttribute()
    {
        return "{$this->name} {$this->lastname}";
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }

    public function belongsSomeCrew()
    {
        if( is_null($this->crew_id) )
            return self::UNCREWED;

        return $this->crew instanceof Crew;
    }
}
