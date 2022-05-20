<?php

namespace App\Models;

use App\Ahex\Zkaffold\Domain\HasExistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasExistence, HasFactory;

    private $operators_cache = null;

    const NO_CREW = false;

    const NO_INTERMEDIARY = false;

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

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function intermediary()
    {
        return $this->belongsTo(Intermediary::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function warranties()
    {
        return $this->hasMany(Warranty::class);
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }

    public function operators()
    {
        return $this->belongsToMany(Operator::class)->using(OperatorWork::class);
    }

    public function operatorsCache()
    {
        if(! is_a($this->operators_cache, EloquentCollection::class) )
            $this->operators_cache = $this->operators;
        
        return $this->operators_cache;
    }

    public function singleOperator()
    {
        return $this->operatorsCache()->first();
    }

    public function hasOperators()
    {
        return (bool) $this->operatorsCache()->count();
    }
    
    public function hasSingleOperator()
    {
        return $this->operatorsCache()->count() == 1;
    }
    
    /**
     * Check if a work has specific operator
     * 
     * @param App\Models\Operator|integer operator_id
     * 
     * @return bool
     */
    public function hasOperatorById($operator)
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

    public function hasIntermediary()
    {
        if(! isset($this->intermediary_id))
            return self::NO_INTERMEDIARY;

        return $this->intermediary instanceof Intermediary;
    }

    public function wasSingleOperatorAssigned()
    {
        return $this->hasSingleOperator() &&! $this->hasCrew();
    }

    public function attachOperators(array $operators_id)
    {
        return $this->operators()->sync($operators_id);
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
