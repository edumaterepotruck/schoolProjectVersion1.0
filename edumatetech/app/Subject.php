<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = [];
    public static function active() {
        
        return Subject::select('id', 'name')
                                ->where('record_status','=',"active")
                                ->get();
    }
}
