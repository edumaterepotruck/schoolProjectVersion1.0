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
        'name', 'email', 'password','record_status'
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
  
    // public function rolemap()
    // {
    //     return $this->hasMany('App\User_Role_Mapping');
    // }
    // public function role()
    // {
    //     return $this->hasManyThrough('App\Role','App\User_Role_Mapping','user__role__mappings.role_id', 'roles.id');
    // }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    
}
