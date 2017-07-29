<?php

namespace App;

use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Check if a user has a permission by itself or a role with the permission.
     * 
     * @param  string
     * @return boolean
     */
    public function hasPermissionOrRoleHasPermission($permission)
    {
        if ($this->roles->count() && $this->roles->each->hasPermission($permission)) {
            return true;
        }

        if ($this->hasPermission($permission)) {
            return true;
        }

        return false;
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function teams()
    {
        return $this->hasMany(Team::class)->withPivot(['status', 'position'])
            ->withTimestamps();
    }

    public function hasTeam($tournament)
    {
        return true;
    }
}
