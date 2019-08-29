<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AcademicYear extends Model
{
    protected $guarded = [];
   
    public static function active() {
        
        return AcademicYear::select('id', 'name')
                                ->where('record_status','=',"active")
                                ->get();
    }
}
