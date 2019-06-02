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

}
