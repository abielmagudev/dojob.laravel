<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory,
        SoftDeletes;

    const REGEXP_COLOR = '/^#[a-f0-9]{6}|[a-f0-9]{3}$/i';

    protected $fillable = [
        'name',
        'color',
        'description',
        'is_enabled',
    ];

    public function hasColor()
    {
        return (bool) preg_match(self::REGEXP_COLOR, $this->color);
    }

    public function hasDescription()
    {
        return isset($this->description) &&! empty($this->description);
    }

    public function isEnabled()
    {
        return (bool) $this->is_enabled;
    }

    public function isDisabled()
    {
        return ! $this->isEnabled();
    }

    public function scopeOnlyEnabled($query)
    {
        return $query->where('is_enabled', 1);
    }

    

    // MEMBER

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function membersId()
    {
        return $this->members->pluck('id')->toArray();
    }

    public function attachMembers(array $members_id)
    {
        return Member::attachCrew($members_id, $this->id);
    }

    public function removeMembers()
    {
        return Member::removeCrew($this->id);
    }

    public function hasMembers()
    {
        return $this->members->count() > 0;
    }

    public function isUsable() // Useful
    {
        return $this->isEnabled() && $this->hasMembers();
    }

    public function isUnusable() // Useless
    {
        return ! $this->isEnabled() ||! $this->hasMembers();
    }

    public function scopeOnlyUsable($query)
    {
        return $query->has('members')->where('is_enabled', 1);
    }


    // WORK

    public function works()
    {
        return $this->hasMany(Work::class);
    }
}
