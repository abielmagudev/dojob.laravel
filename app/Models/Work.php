<?php

namespace App\Models;

use App\Models\Extensions\HasExistence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasExistence,
        HasFactory;

    const NONE_INTERMEDIARY = false;
    
    const NONE_CREW = false;

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
        'notes',
        'client_id',
        'intermediary_id',
        'job_id',
        'crew_id',
    ];


    // Attributes ----------------------------------------------------------

    public function getAssignedAttribute()
    {
        $assignments = self::assignments();

        if(! $this->isReal() )
            return self::assignments()[0];

        return $this->hasAssignedCrew() ? array_shift($assignments) : array_pop($assignments);        
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
        if(! $this->isStarted() )
            return;

        return implode(' ', [
            $this->started_date,
            $this->started_time
        ]);
    }

    public function getFinishedAtAttribute()
    {
        if(! $this->isFinished() )
            return;

        return implode(' ', [
            $this->finished_date,
            $this->finished_time
        ]);
    }

    public function getClosedAtAttribute()
    {
        if(! $this->isClosed() )
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

    public function member()
    {
        return $this->membersCache()->first();
    }


    // Validations ----------------------------------------------------------

    public function hasIntermediary()
    {
        if(! isset($this->intermediary_id) )
            return self::NONE_INTERMEDIARY;

        return $this->intermediary instanceof Intermediary;
    }

    public function hasAssignedMember()
    {
        return ($this->membersCache()->count() == 1) &&! $this->hasAssignedCrew();
    }

    public function hasAssignedCrew()
    {
        if(! isset($this->crew_id) )
            return self::NONE_CREW;

        return $this->crew instanceof Crew;
    }

    public function hasMembers()
    {
        return (bool) $this->membersCache()->count();
    }

    public function inMembers($member, $prop = 'id')
    {   
        if(! is_a($member, Member::class) )
            $member = (object) [$prop => $member];

        return $this->membersCache()->contains($prop, $member->$prop);
    }

    public function hasStatus(string $status)
    {
        return $this->status == $status;
    }

    public function isStarted()
    {
        return isset($this->started_date) && isset($this->started_time);
    }

    public function isFinished()
    {
        return isset($this->finished_date) && isset($this->finished_time);
    }

    public function isClosed()
    {
        return isset($this->closed_date) && isset($this->closed_time);
    }


    // Scopes ----------------------------------------------------------

    public function scopeWhereHasOpenStatus($query)
    {
        return $query->whereIn('status', self::allOpenStatus());
    }

    public function attachMembers(array $members_id)
    {
        return $this->members()->syncWithPivotValues($members_id, ['created_at' => now()]);
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
