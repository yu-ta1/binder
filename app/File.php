<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function users(){
        return $this->belongsTo('App\User');
    }
    
    public function teams(){
        return $this->belongsTo('App\Team');
    }
    
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
