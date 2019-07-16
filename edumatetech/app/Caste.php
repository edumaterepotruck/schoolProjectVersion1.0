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

    public static function byReligion($religion_id)
    {
        return Caste::select('id','name')
                               ->where('religion_id','=',$religion_id)
                               ->get();
    }
}
