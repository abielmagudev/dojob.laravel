<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plugin extends Model
{
    use HasFactory;

    public function jobs()
    {
        return $this->belongstoMany(Job::class)
                    ->using(JobPlugin::class)
                    ->withTimestamps();
    }
}
