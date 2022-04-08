<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notice extends Model
{
    public function teams(){
        return $this->belongsTo('App\Team');
    }
    
    public function notice_posts(){
        return $this->hasMany('App\Notice_Post');
    }
}
