<?php

namespace App\Models;

use App\Traits\Teamable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, LaratrustUserTrait, Teamable;

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

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function statistics()
    {
        return $this->hasOne(Statistic::class);
    }

    /**
     * Get the gamertag based on the tournament's platform.
     * Change to a separate database table to allow for future expansion.
     */
    public function getAccountForTournament(Tournament $tournament)
    {
        $field = "account_" . $tournament->platform->name;
        return $this->profile->{$field};        
    }

    public function getRouteKeyName()
    {
        return 'username';
    }
}
