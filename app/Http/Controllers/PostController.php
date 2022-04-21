<?php

namespace App\Http\Controllers;

use App\User;
use App\Team;
use App\Post;
use App\Notice;
use App\Notice_Post;
use App\Time_Line;
use App\Time_Line_Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function notice(Team $team)
    {
        $notices=$team->notices()->first();
        $notice_post=$notices->notice_posts()->get();
        return view('/posts/notice')->with(['team'=>$team,'notices'=>$notice_post]);
    }
    
    public function time_line(Time_Line_Post $time_line_post)
    {
        return view('/posts/time_line')->with(['time_lines'=>$time_line_post->get()]);
    }
    
    public function create()
    {
        return view('/posts/create');
    }
}