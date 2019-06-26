<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caste extends Model
{
    protected $guarded = [];
    public static function active() {
        
        return Caste::select('id', 'name')
                                ->where('record_status','=',"active")
                                ->get();
    }
}
