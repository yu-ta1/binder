<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function users(){
        return $this->belongsTo('App\User');
    }
    
    public function files(){
        return $this->belongsTo('App\File');
    }
    
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    
    public function goods(){
        return $this->hasMany('App\Good');
    }
}
