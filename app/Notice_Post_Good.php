<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice_Post_Good extends Model
{
    protected $table = 'notice_post_goods';
    
    public function notice_posts(){
        return $this->belongsTo('App\Notice_Post');
    }
    
    public function users(){
        return $this->belongsTo('App\User');
    }
}
