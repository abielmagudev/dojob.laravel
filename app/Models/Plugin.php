<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plugin extends Model
{
    use HasFactory;

    protected $fillable = [
        'api_plugin_id',
        'is_enabled',
        'settings_encoded',
    ];

    public function getNameAttribute()
    {
        return $this->api->name;
    }

    public function getSettingsAttribute()
    {
        return ! is_null($this->settings_encoded) ? json_decode($this->settings_encoded) : json_decode('');
    }

    public function api()
    {
        return $this->belongsTo(ApiPlugin::class, 'api_plugin_id');
    }

    public function jobs()
    {
        return $this->belongstoMany(Job::class)
                    ->withTimestamps()
                    ->using(JobPlugin::class);
    }

    public function attachJobs(array $jobs_id)
    {
        return $this->jobs()->attach($jobs_id, [
            'created_at' => now(),
        ]);
    }

    public function attachJob(int $job_id)
    {
        return $this->attachJobs([$job_id]);
    }

    public function detachJobs(array $jobs_id)
    {
        return $this->jobs()->detach($jobs_id);
    }

    public function detachJob(int $job_id)
    {
        return $this->detachJobs([$job_id]);
    }

    public function hasSetting(string $setting)
    {
        return isset($this->settings->$setting);
    }

    public function isEnabled()
    {
        return (bool) $this->is_enabled;
    }
}
