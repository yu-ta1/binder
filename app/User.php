<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function teams(){
        return $this->belongsToMany('App\Team');
    }
    
    public function notice_posts(){
        return $this->hasMany('App\Notice_Post');
    }
    
    public function notice_post_comments(){
        return $this->hasMany('App\Notice_Post_Comment');
    }
    
    public function notice_post_goods(){
        return $this->hasMany('App\Notice_Post_Good');
    }
    
    public function time_line_posts(){
        return $this->hasMany('App\Time_Line_Post');
    }
    
    public function time_line_post_comments(){
        return $this->hasMany('App\Time_Line_Post_Comment');
    }
    
    public function time_line_post_goods(){
        return $this->hasMany('App\Time_Line_Post_Good');
    }
}
