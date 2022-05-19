<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'notes',
        'expires',
        'work_id',
    ];

    public function work()
    {
        return $this->belongsTo(Work::class)->with('job');
    }
}
