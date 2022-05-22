<?php

namespace App\Models;

use App\Ahex\Zkaffold\Domain\HasExistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasExistence,
        HasFactory,
        SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'enabled',
    ];

    public function scopeOnlyEnabled($query)
    {
        return $query->where('enabled', 1);
    }

    public function scopeOnlyCustom($query)
    {
        return $query->where('custom', 1);
    }

    public function plugins()
    {
        return $this->belongsToMany(Plugin::class)
                    ->withTimestamps()
                    ->using(JobPlugin::class);
    }

    public function attachPlugin(int $plugin_id)
    {
        return $this->plugins()->attach($plugin_id, [
            'created_at' => now(),
        ]);
    }

    public function detachPlugin(int $plugin_id)
    {
        return $this->plugins()->detach($plugin_id);
    }

    public function isEnabled()
    {
        return (bool) $this->enabled;
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
