<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time_Line_Post_Comment extends Model
{
    public function time_line_posts(){
        return $this->belongsTo('App\Time_Line_Post');
    }
    
    public function users(){
        return $this->belongsTo('App\User');
    }
}
