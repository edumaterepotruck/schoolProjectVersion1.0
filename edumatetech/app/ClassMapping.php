<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassMapping extends Model
{
    protected $guarded = [];
    public static function active() {
        
        return ClassMapping::select('id', 'batchname')
                                ->where('record_status','=',"active")
                                ->get();
    }
}
