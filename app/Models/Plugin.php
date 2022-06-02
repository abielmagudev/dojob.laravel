<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plugin extends Model
{
    use HasFactory;

    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
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
}
