<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notice_Post extends Model
{
    
    public function users(){
        return $this->belongsTo('App\User');
    }
    
    public function notices(){
        return $this->belongsTo('App\Notice');
    }
}
