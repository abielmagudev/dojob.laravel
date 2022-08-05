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

    private $members_cache = null;

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
    


    // Warranties

    public function warranties()
    {
        return $this->hasMany(Warranty::class);
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



    // Members

    public function members()
    {
        return $this->belongsToMany(Member::class);
    }

    public function membersCache()
    {
        if(! is_a($this->members_cache, EloquentCollection::class) )
            $this->members_cache = $this->members;
        
        return $this->members_cache;
    }

    public function singleMember()
    {
        return $this->membersCache()->first();
    }

    public function attachMembers(array $workers_id)
    {
        return $this->members()->syncWithPivotValues($workers_id, ['created_at' => now()]);
    }

    public function hasMembers()
    {
        return (bool) $this->membersCache()->count();
    }

    public function hasSingleMember()
    {
        return $this->membersCache()->count() == 1;
    }
    
    public function hasSingleMemberAssigned()
    {
        return $this->hasSingleMember() &&! $this->hasCrew();
    }

    public function hasMember($member)
    {   
        $member_id = is_a($member, Member::class) ? $member->id : $member;
        return $this->membersCache()->contains('id', $member_id);
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
