<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassDivision extends Model
{
    protected $guarded = [];
    public static function active() {
        
        return ClassDivision::select('id', 'name')
                                ->where('record_status','=',"active")
                                ->get();
    }
}
