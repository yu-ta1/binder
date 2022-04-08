<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Team extends Model 
{
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function users(){
        return $this->belongsToMany('App\User');
    }
    
    public function notices(){
        return $this->hasOne('App\Notice');
    }
    
    public function time_lines(){
        return $this->hasOne('App\Time_Line');
    }
    
    public function files(){
        return $this->hasMany('App\File');
    }
}