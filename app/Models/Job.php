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

    private $plugins_cache;

    protected $fillable = [
        'name',
        'description',
        'is_enabled',
    ];

    public function scopeOnlyEnabled($query)
    {
        return $query->where('is_enabled', 1);
    }

    public function scopeOnlyCustom($query)
    {
        return $query->where('is_custom', 1);
    }

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

    public function pluginsCache()
    {
        if( is_null($this->plugins_cache) )
            $this->plugins_cache = $this->plugins;

        return $this->plugins_cache;
    }

    public function syncPlugins(array $plugins_id, $detach = true)
    {
        return $this->plugins()->sync($plugins_id, $detach);
    }

    public function hasPlugin($plugin)
    {
        $plugin_id = is_a($plugin, Plugin::class) ? $plugin->id : $plugin;
        return (bool) $this->pluginsCache()->where('id', $plugin_id)->first();
    }

    public function isEnabled()
    {
        return (bool) $this->is_enabled;
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
