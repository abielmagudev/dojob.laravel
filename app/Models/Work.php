<?php

namespace App\Models;

use App\Ahex\Zkaffold\Domain\HasExistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory, HasExistence;

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

    private function operatorsCache()
    {
        if( is_a($this->operators_cache, EloquentCollection::class) )
            return $this->operators_cache;

        return $this->operators_cache = $this->operators;
    }

    public function attachOperators(array $operators_id)
    {
        return $this->operators()->attach($operators_id);
    }

    /**
     * Check if a work has specific operators
     * 
     * @param object App\Models\Operator || int operator_id
     * 
     * @return bool
     */
    public function hasOperator($operator)
    {            
        return (bool) $this->operatorsCache()->firstWhere('id', $operator);
    }

    public function hasCrew()
    {
        if(! isset($this->crew_id) )
            return self::NO_CREW;

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
