<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function users(){
        return $this->belongsToMany('App\User');
    }
    
}