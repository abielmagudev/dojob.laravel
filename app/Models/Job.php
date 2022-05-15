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
        'enabled',
    ];

    public function scopeOnlyEnabled($query)
    {
        return $query->where('enabled', 1)->get();
    }

    public function scopeOnlyCustom($query)
    {
        return $query->where('custom', 1)->get();
    }

    public function plugins()
    {
        return $this->belongsToMany(Plugin::class)
                    ->using(JobPlugin::class)
                    ->withTimestamps();
    }

    public function isEnabled()
    {
        return (bool) $this->enabled;
    }

    public function isDisabled()
    {
        return ! $this->isEnabled();
    }

    public static function defaults()
    {
        return [
            'Inspection' => 'Inspect and approval of the work done',
            'Maintenance' => 'Maintenance of a completed work',
            'Repair' => 'Repair a job done',
        ];
    }
}
