<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    const WITHOUT_CREW = false;

    protected $fillable = [
        'client_id',
        'job_id',
        'crew_id',
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
    ];

    public function getJobNameAttribute()
    {
        return $this->job->name;
    }

    public function getScheduledAtAttribute()
    {
        return "{$this->scheduled_date} {$this->scheduled_time}";
    }

    public function getStartedAtAttribute()
    {
        return "{$this->scheduled_date} {$this->scheduled_time}";
    }

    public function getFinishedAtAttribute()
    {
        return "{$this->scheduled_date} {$this->scheduled_time}";
    }

    public function getClosedAtAttribute()
    {
        return "{$this->scheduled_date} {$this->scheduled_time}";
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function operators()
    {
        return $this->belongsToMany(Operator::class)->using(OperatorWork::class);
    }

    public function attachOperators($operator_id = null)
    {
        if(! $this->hasCrew() )
            return $this->operators()->attach($operator_id);

        return $this->operators()->attach($this->crew->operators);
    }

    public function hasCrew()
    {
        if(! isset($this->crew_id) )
            return self::WITHOUT_CREW;

        return $this->crew instanceof Crew;
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

    public static function defaultStatus()
    {
        return self::allStatus()[0];
    }
}
