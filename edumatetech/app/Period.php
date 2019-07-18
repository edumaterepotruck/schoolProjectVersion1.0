<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $guarded = [];
    public static function active() {
        
        return Subject::select('id', 'periodname')
                                ->where('record_status','=',"active")
                                ->get();
    }
}
