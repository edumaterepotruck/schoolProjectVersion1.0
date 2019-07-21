<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $guarded = [];
    public static function active() {
        
        return Day::select('id', 'dayname')
                                ->where('record_status','=',"active")
                                ->get();
    }
}
