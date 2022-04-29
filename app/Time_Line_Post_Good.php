<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time_Line_Post_Good extends Model
{
    protected $table = 'time_line_post_goods';
    
    public function time_line_posts(){
        return $this->belongsTo('App\Time_Line_Post');
    }
    
    public function users(){
        return $this->belongsTo('App\User');
    }
}
