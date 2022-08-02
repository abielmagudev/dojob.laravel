<?php

namespace App\Models;

use App\Ahex\Zkaffold\Domain\HasExistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasExistence,
        HasFactory;

    const NO_INTERMEDIARY = false;
    
    const NO_CREW = false;

    private $workers_cache = null;

    protected $fillable = [
        'priority',
        'status',
        'scheduled_date',
        'scheduled_time',
        'started_date',
        'started_time',
        'finished_date',
        'finished_time',
        'closed_date',
        'closed_time',
        'client_id',
        'intermediary_id',
        'job_id',
        'crew_id',
        'notes',
    ];


    // Client

    public function client()
    {
        return $this->belongsTo(Client::class);
    }



    // Job

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function getJobNameAttribute()
    {
        return $this->job->name;
    }



    // Workers - StaffMembers

    public function workers()
    {
        return $this->belongsToMany(Member::class);
    }

    public function workersCache()
    {
        if(! is_a($this->workers_cache, EloquentCollection::class) )
            $this->workers_cache = $this->workers;
        
        return $this->workers_cache;
    }

    public function singleWorker()
    {
        return $this->workersCache()->first();
    }

    public function hasWorkers()
    {
        return (bool) $this->workersCache()->count();
    }

    public function hasSingleWorker()
    {
        return $this->workersCache()->count() == 1;
    }
    
    public function hasWorker($worker)
    {   
        $worker_id = is_a($worker, Operator::class) ? $worker->id : $worker;
        return $this->workersCache()->contains('id', $worker_id);
    }

    public function hasSingleWorkerAssigned()
    {
        return $this->hasSingleWorker() &&! $this->hasCrew();
    }

    public function attachWorkers(array $workers_id)
    {
        return $this->workers()->syncWithPivotValues($workers_id, ['created_at' => now()]);
    }



    // Crew

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }

    public function hasCrew()
    {
        if(! isset($this->crew_id) )
            return self::NO_CREW;

        return $this->crew instanceof Crew;
    }



    // Intermediary

    public function intermediary()
    {
        return $this->belongsTo(Intermediary::class);
    }

    public function hasIntermediary()
    {
        if(! isset($this->intermediary_id))
            return self::NO_INTERMEDIARY;

        return $this->intermediary instanceof Intermediary;
    }



    // Dates and times

    public function getScheduledAtAttribute()
    {
        return "{$this->scheduled_date} {$this->scheduled_time}";
    }

    public function getStartedAtAttribute()
    {
        return "{$this->started_date} {$this->started_time}";
    }

    public function getFinishedAtAttribute()
    {
        return "{$this->finished_date} {$this->finished_time}";
    }

    public function getClosedAtAttribute()
    {
        return "{$this->closed_date} {$this->closed_time}";
    }

    public function hasStarted()
    {
        return isset($this->started_date) && isset($this->started_time);
    }

    public function hasFinished()
    {
        return isset($this->finished_date) && isset($this->finished_time);
    }



    // Warranties

    public function warranties()
    {
        return $this->hasMany(Warranty::class);
    }



    // Status

    public function scopeWhereHasOpenStatus($query)
    {
        return $query->whereIn('status', self::allOpenStatus());
    }

    public function hasStatus(string $status)
    {
        return $this->status == $status;
    }

    public static function allStatus()
    {
        return [
            'waiting',
            'started',
            'finished',
            'completed',
            'canceled',
            'denialed',
            'pending',
        ];
    }

    public static function allOpenStatus()
    {
        return [
            'waiting',
            'started',
            'finished',
        ];
    }

    public static function allCloseStatus()
    {
        return [
            'completed',
            'canceled',
            'denialed',
        ];
    }

    public static function defaultStatus()
    {
        return self::allStatus()[0];
    }
}
