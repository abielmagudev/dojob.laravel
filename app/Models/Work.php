<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class Work extends Model
{
    use HasFactory;

    const NO_CREW = false;

    protected $fillable = [
        'client_id',
        'crew_id',
        'job_id',
        'priority',
        'scheduled_date',
        'scheduled_time',
        'started_date',
        'started_time',
        'finished_date',
        'finished_time',
        'closed_date',
        'closed_time',
        'status',
    ];

    public $operators_cache = null;

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

    private function operatorsCache()
    {
        if( is_a($this->operators_cache, EloquentCollection::class) )
            return $this->operators_cache;

        return $this->operators_cache = $this->operators;
    }

    public function hasOperator($operator)
    {            
        $operator_id = is_a($operator, Operator::class) ? $operator->id : $operator;
        return (bool) $this->operatorsCache()->firstWhere('id', $operator_id);
    }

    public function hasCrew()
    {
        if(! isset($this->crew_id) )
            return self::NO_CREW;

        return $this->crew instanceof Crew;
    }

    public function isReal()
    {
        return isset($this->id);
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
