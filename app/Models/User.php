<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens,
        HasFactory,
        HasRoles,
        Notifiable,
        SoftDeletes;

    protected static $profile_types = [
        'intermedary' => Intermediary::class,
        'member' => Member::class,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute(string $string)
    {
        return $this->attributes['password'] = bcrypt($string);
    }

    public function getProfileAttribute()
    {
        return $this->profilable;
    }

    public function getProfileTypeAttribute()
    {
        return array_search($this->profilable_type, self::$profile_types);
    }

    public function getRoleNameAttribute()
    {
        return $this->getRoleNames()->first();
    }

    public function profilable()
    {
        return $this->morphTo();
    }

    public static function setupPermissions()
    {
        return [
            'clients' => ['index','show','create','store','edit','update','destroy'],
            'crews' => ['index','show','create','store','edit','update','destroy'],
            'intermediaries' => ['index','show','create','store','edit','update','destroy'],
            'jobs' => ['index','show','create','store','edit','update','destroy'],
            'members' => ['index','show','create','store','edit','update','destroy'],
            'plugins' => ['index','show','create','store','edit','update','destroy'],
            'skills' => ['index','show','create','store','edit','update','destroy'],
            'users' => ['index','show','create','store','edit','update','destroy'],
            'warranties' => ['index','show','create','store','edit','update','destroy'],
            'works' => ['index','show','create','store','edit','update','destroy'],
        ];
    }

    public static function setupRoles()
    {
        return [
            'administrator' => [
                'clients' => ['index','show','create','store','edit','update','destroy'],
                'crews' => ['index','show','create','store','edit','update','destroy'],
                'intermediaries' => ['index','show','create','store','edit','update','destroy'],
                'jobs' => ['index','show','create','store','edit','update','destroy'],
                'members' => ['index','show','create','store','edit','update','destroy'],
                'plugins' => ['index','show','create','store','edit','update','destroy'],
                'skills' => ['index','show','create','store','edit','update','destroy'],
                'users' => ['index','show','create','store','edit','update','destroy'],
                'warranties' => ['index','show','create','store','edit','update','destroy'],
                'works' => ['index','show','create','store','edit','update','destroy'],
            ],
            'coordinator' => [
                'clients' => ['index','show','create','store','edit','update'],
                'crews' => ['index','show','create','store','edit','update','destroy'],
                'members' => ['index','show','create','store','edit','update'],
                'warranties' => ['index','show','create','store','edit','update','destroy'],
                'works' => ['index','show','create','store','edit','update','destroy'],
            ],
            'supervisor' => [
                'clients' => ['index','show'],
                'crews' => ['index','show'],
                'warranties' => ['index','show'],
                'works' => ['index','show','edit','update'],
            ],
            'operator' => [
                'works' => ['index','show','edit','update'],
            ],
            'intermediary' => [
                'works' => ['index','show'],
            ],
        ];
    }
}
