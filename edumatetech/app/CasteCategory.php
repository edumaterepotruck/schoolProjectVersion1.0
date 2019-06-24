<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CasteCategory extends Model
{
    protected $guarded = [];
    public static function active() {
        
        return CasteCategory::select('id', 'name')
                                ->where('record_status','=',"active")
                                ->get();
    }
}
