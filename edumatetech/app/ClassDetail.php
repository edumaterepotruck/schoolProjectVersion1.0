<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassDetail extends Model
{
    protected $guarded = [];
    public static function active() {
        
        return ClassDetail::select('id', 'name')
                                ->where('record_status','=',"active")
                                ->get();
    }
}
