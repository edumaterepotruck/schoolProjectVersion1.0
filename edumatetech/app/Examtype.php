<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examtype extends Model
{
    protected $guarded = [];
    public static function active() {
        
        return Examtype::select('id', 'examname')
                                ->where('record_status','=',"active")
                                ->get();
    }
}
