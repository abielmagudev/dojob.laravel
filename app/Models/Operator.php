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
        'position',
        'crew_id',
    ];

    public function getFullnameAttribute()
    {
        return "{$this->name} {$this->lastname}";
    }

    public function scopeFree($query, int $crew_id)
    {
        return $query->where('crew_id', $crew_id)->update(['crew_id' => null]);
    }

    public function scopeUncrewed($query, array $operators)
    {
        return $query->whereIn('id', $operators)->update(['crew_id' => null]);
    }

    public function scopeCrewed($query, array $operators, int $crew_id)
    {
        return $query->whereIn('id', $operators)->update(['crew_id' => $crew_id]);
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }

    public function works()
    {
        return $this->belongsToMany(Work::class)->using(OperatorWork::class);
    }

    public function hasCrewed()
    {
        if( is_null($this->crew_id) )
            return self::UNCREWED;

        return $this->crew instanceof Crew;
    }
}
