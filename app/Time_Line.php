<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Time_Line extends Model
{
    protected $table = 'time_lines';
    
    public function teams(){
        return $this->belongsTo('App\Team');
    }
    
    public function time_line_posts(){
        return $this->hasMany('App\Time_Line_Post','time_line_id');
    }
}