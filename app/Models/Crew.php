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

    public function scopeOnlyEnabled($query)
    {
        return $query->where('is_enabled', 1);
    }

    public function scopeOnlyUsable($query)
    {
        return $query->has('operators')->where('is_enabled', 1);
    }

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function operators()
    {
        return $this->hasMany(Operator::class);
    }

    public function operatorsId()
    {
        return $this->operators->pluck('id')->toArray();
    }

    public function attachOperators(array $operators_id)
    {
        return Operator::attachCrew($operators_id, $this->id);
    }

    public function removeOperators()
    {
        return Operator::removeCrew($this->id);
    }

    public function hasColor()
    {
        return (bool) preg_match(self::REGEXP_COLOR, $this->color);
    }

    public function hasOperators()
    {
        return $this->operators->count() > 0;
    }

    public function isEnabled()
    {
        return (bool) $this->is_enabled;
    }

    public function isDisabled()
    {
        return ! $this->isEnabled();
    }
}
