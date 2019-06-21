<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassBranch extends Model
{
    protected $guarded = [];
    public static function active() {
        
        return ClassBranch::select('id', 'name')
                                ->where('record_status','=',"active")
                                ->get();
    }
}
