<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    protected $guarded = [];
    public static function active() {
        
        return Religion::select('id', 'name')
                                ->where('record_status','=',"active")
                                ->get();
    }
}
