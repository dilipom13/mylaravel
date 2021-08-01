<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'about', 'country', 'state', 'city'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /*public function isSuperAdmin(){
        return $this->role == 'super-admin';
    }*/
    public function isAdmin(){
        return $this->role == 'admin';
    }
    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }
    public function hasTag($countriesId)
    {
        return in_array($countriesId, $this->countries->pluck('id')->toArray());
    }
    public function state()
    {
        return $this->belongsToMany(State::class);
    }
}
