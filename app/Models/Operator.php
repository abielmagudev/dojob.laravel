<?php

namespace App\Models;

use App\Ahex\Zkaffold\Domain\HasExistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasExistence,
        HasFactory,
        SoftDeletes;

    const UNCREWED = false;

    private $skills_cache = null;

    private $works_cache = null;

    protected $fillable = [
        'name',
        'lastname',
        'phone',
        'email',
        'birthdate',
        'notes',
        'position',
        'is_available',
        'crew_id',
    ];

    public function getFullnameAttribute()
    {
        return "{$this->name} {$this->lastname}";
    }

    public function scopeOnlyAvailable($query)
    {
        return $query->where('is_available', 1);
    }

    public function scopeAttachCrew($query, array $operators_id, int $crew_id)
    {
        return $query->whereIn('id', $operators_id)->update(['crew_id' => $crew_id]);
    }

    public function scopeDetachCrew($query, array $operators_id)
    {
        return $query->whereIn('id', $operators_id)->update(['crew_id' => null]);
    }

    public function scopeRemoveCrew($query, int $crew_id)
    {
        return $query->where('crew_id', $crew_id)->update(['crew_id' => null]);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function skillsCache()
    {
        if( is_null($this->skills_cache) )
            $this->skills_cache = $this->skills;

        return $this->skills_cache;
    }

    public function works()
    {
        return $this->belongsToMany(Work::class);
    }

    public function worksCache()
    {
        if( is_null($this->works_cache) )
            $this->works_cache = $this->works;

        return $this->works_cache; 
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }

    public function attachSkills(array $skills_id)
    {
        return $this->skills()->syncWithPivotValues($skills_id, ['created_at' => now()]);
    }

    public function isAvailable()
    {
        return (bool) $this->is_available;
    }

    public function isUnavailable()
    {
        return ! $this->isAvailable();
    }

    public function hasSkills()
    {
        return (bool) $this->skills->count();
    }

    public function hasSkill($skill)
    {
        $skill_id = is_a($skill, Skill::class) ? $skill->id : $skill;
        return $this->skillsCache()->contains('id', $skill_id);
    }

    public function hasCrew()
    {
        if(! is_null($this->crew_id) )
            return $this->crew instanceof Crew;

        return self::UNCREWED;
    }

    public function hasWorks()
    {
        return (bool) $this->worksCache()->count();
    }

    public function hasWork($work)
    {
        $work_id = is_a($work, Work::class) ? $work->id : $work;
        return $this->worksCache()->contains('id', $work_id);
    }
}
