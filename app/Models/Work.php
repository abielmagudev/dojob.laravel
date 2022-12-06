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


    // Attributes ----------------------------------------------------------

    public function getJobNameAttribute()
    {
        return $this->job->name;
    }

    public function getAssignedAttribute()
    {
        $assignments = self::assignments();

        if(! $this->isReal() )
            return self::assignments()[0];

        return $this->hasCrew() ? array_shift($assignments) : array_pop($assignments);        
    }

    public function getScheduledAtAttribute()
    {
        return implode(' ', [
            $this->scheduled_date,
            $this->scheduled_time
        ]);
    }

    public function getStartedAtAttribute()
    {
        if(! $this->hasStarted() )
            return;

        return implode(' ', [
            $this->started_date,
            $this->started_time
        ]);
    }

    public function getFinishedAtAttribute()
    {
        if(! $this->hasFinished() )
            return;

        return implode(' ', [
            $this->finished_date,
            $this->finished_time
        ]);
    }

    public function getClosedAtAttribute()
    {
        if(! $this->hasClosed() )
            return;

        return implode(' ', [
            $this->closed_date,
            $this->closed_time
        ]);
    }


    // Relations ----------------------------------------------------------

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function intermediary()
    {
        return $this->belongsTo(Intermediary::class);
    }

    public function warranties()
    {
        return $this->hasMany(Warranty::class);
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }

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


    // Validations ----------------------------------------------------------

    public function hasIntermediary()
    {
        if(! isset($this->intermediary_id) )
            return self::NO_INTERMEDIARY;

        return $this->intermediary instanceof Intermediary;
    }

    public function hasCrew()
    {
        if(! isset($this->crew_id) )
            return self::NO_CREW;

        return $this->crew instanceof Crew;
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

    public function hasStatus(string $status)
    {
        return $this->status == $status;
    }

    public function hasStarted()
    {
        return isset($this->started_date) && isset($this->started_time);
    }

    public function hasFinished()
    {
        return isset($this->finished_date) && isset($this->finished_time);
    }

    public function hasClosed()
    {
        return isset($this->closed_date) && isset($this->closed_time);
    }


    // Scopes ----------------------------------------------------------

    public function scopeWhereHasOpenStatus($query)
    {
        return $query->whereIn('status', self::allOpenStatus());
    }


    // Statics ----------------------------------------------------------

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

    public static function assignments()
    {
        return ['crew', 'member'];
    }
}
