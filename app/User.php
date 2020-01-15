<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 
        'email', 
        'password', 
        'role_id', 
        'is_active', 
        'photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    /* Don't know what is this, it was playing around with atributes */
    // public function setPasswordAttribute()
    // {
    //     if (!empty($password)) {
    //         $this->attributes['password'] = bcrypt($password);
    //     }
    // }

    public function isAdmin()
    {
        if ($this->role->name == "administrator" && $this->is_active == 1) 
        {
            return true;
        }

        return false;
    }
}
