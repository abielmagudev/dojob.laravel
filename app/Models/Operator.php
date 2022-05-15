<?php

namespace App\Models;

use App\Ahex\Zkaffold\Domain\HasExistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory, HasExistence;

    const UNCREWED = false;

    protected $fillable = [
        'name',
        'lastname',
        'phone',
        'email',
        'birthdate',
        'notes',
        'position',
        'available',
        'crew_id',
    ];

    public function getFullnameAttribute()
    {
        return "{$this->name} {$this->lastname}";
    }

    public function scopeOnlyAvailable($query)
    {
        return $query->where('available', 1);
    }

    public function scopeAddCrew($query, array $operators_id, int $crew_id)
    {
        return $query->whereIn('id', $operators_id)->update(['crew_id' => $crew_id]);
    }

    public function scopeRemoveCrew($query, array $operators_id)
    {
        return $query->whereIn('id', $operators_id)->update(['crew_id' => null]);
    }

    public function scopeCleanCrew($query, int $crew_id)
    {
        return $query->where('crew_id', $crew_id)->update(['crew_id' => null]);
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }

    public function works()
    {
        return $this->belongsToMany(Work::class)->using(OperatorWork::class);
    }

    public function isAvailable()
    {
        return (bool) $this->available;
    }

    public function hasCrew()
    {
        if(! is_null($this->crew_id) )
            return $this->crew instanceof Crew;

        return self::UNCREWED;
    }
}
