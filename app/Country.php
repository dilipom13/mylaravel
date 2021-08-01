<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Country extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'sortname', 'phonecode',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
