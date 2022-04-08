<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Time_Line extends Model
{
    public function teams(){
        return $this->belongsTo('App\Team');
    }
}
