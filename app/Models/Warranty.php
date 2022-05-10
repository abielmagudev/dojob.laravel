<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    use HasFactory;

    protected $fillable = [
        'expires',
        'notes',
        'work_id',
    ];

    public function getJobNameAttribute()
    {
        return $this->work->job->name;
    }

    public function work()
    {
        return $this->belongsTo(Work::class)->with('job');
    }

    public function belongsWork()
    {
        if(! isset($this->work_id) )
            return false;

        return $this->work instanceof Work;
    }
}
