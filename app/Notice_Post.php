<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notice_Post extends Model
{
    protected $table = 'notice_posts';
    
    public function getPaginateByLimit(int $notice_id, int $limit_count = 2)
    {
        return $this->where('notice_id',$notice_id)->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function users(){
        return $this->belongsTo('App\User');
    }
    
    public function notices(){
        return $this->belongsTo('App\Notice');
    }
    
    public function notice_post_comments(){
        return $this->hasMany('App\Notice_Post_Comment');
    }
    
    public function notice_post_goods(){
        return $this->hasMany('App\Notice_Post_Goods');
    }
}
