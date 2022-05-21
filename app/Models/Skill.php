<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function operators()
    {
        return $this->belongsToMany(Operator::class);
    }

    public function hasOperators()
    {
        return (bool) $this->operators->count();
    }
}
