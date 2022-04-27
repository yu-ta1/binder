<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Time_Line_Post extends Model
{
    protected $table = 'time_line_posts';
    
    protected $fillable = ['title','body','user_id','time_line_id','updated_at','created_at'];
    
    public function getPaginateByLimit(int $time_line_id, int $limit_count = 2)
    {
        return $this->where('time_line_id',$time_line_id)->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function users(){
        return $this->belongsTo('App\User');
    }
    
    public function time_lines(){
        return $this->belongsTo('App\Time_Line');
    }
    
    public function time_line_post_comments(){
        return $this->hasMany('App\Time_Line_Post_Comment');
    }
    
    public function time_line_post_goods(){
        return $this->hasMany('App\Time_Line_Post_Goods');
    }
}
