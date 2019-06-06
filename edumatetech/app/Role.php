<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];
    public static function active() {
        
        return Role::select('id', 'name')
                                ->where('record_status','=',"active")
                                ->get();
    }

    // public function rolemap()
    // {
    //     return $this->hasMany('App\User_Role_Mapping');
    // }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
