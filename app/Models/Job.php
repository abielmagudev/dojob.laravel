<?php

namespace App\Models;

use App\Models\Extensions\HasExistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasExistence,
        HasFactory,
        SoftDeletes;

    private $plugins_cache;

    protected $fillable = [
        'name',
        'description',
        'is_enabled',
    ];

    // Relations

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function plugins()
    {
        return $this->belongsToMany(Plugin::class)
                    ->withTimestamps()
                    ->using(JobPlugin::class);
    }

    public function syncPlugins(array $plugins_id, $detach = true)
    {
        return $this->plugins()->sync($plugins_id, $detach);
    }


    // Cache

    public function pluginsCache()
    {
        if( is_null($this->plugins_cache) )
            $this->plugins_cache = $this->plugins;

        return $this->plugins_cache;
    }


    // Validations

    public function isEnabled()
    {
        return (bool) $this->is_enabled;
    }

    public function hasPlugin($plugin)
    {
        if( is_a($plugin, Plugin::class) )
            $plugin = $plugin->id;

        return (bool) $this->pluginsCache()->where('id', $plugin)->first();
    }

    
    // Scopes

    public function scopeOnlyEnabled($query)
    {
        return $query->where('is_enabled', 1);
    }


    // Statics

    public static function defaults()
    {
        return [
            'Inspection' => 'Inspect and approval of the work done',
            'Maintenance' => 'Maintenance of a completed work',
            'Repair' => 'Repair a job done',
        ];
    }
}
