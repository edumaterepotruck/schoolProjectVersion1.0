<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Role_Mapping extends Model
{
    protected $guarded = [];
    

    // ADDED IN SECOND EDIT

    public function user()
    {
        return $this->belongsTo('App\User');
    } 
    public function role()
    {
        return $this->belongsTo('App\Role');
    }     
}
