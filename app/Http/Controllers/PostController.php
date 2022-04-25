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
        return view('teams/notices/index')->with(['team'=>$team,'notice_posts'=>$notice_post]);
    }
    
    public function time_line(Team $team)
    {
        $time_lines=$team->time_lines()->first();
        $time_line_post=$time_lines->time_line_posts()->get();
        return view('teams/time_lines/index')->with(['team'=>$team,'time_line_posts'=>$time_line_post]);
    }
    
    public function notice_create(Team $team)
    {
        return view('teams/notices/create')->with(['team'=>$team ]);
    }
    
    public function time_line_create(Team $team)
    {
        return view('teams/time_lines/create')->with(['team'=>$team ]);
    }
    
    public function time_line_store(Request $request, Time_Line_Post $time_line_post, Team $team)
    {
        $user=Auth::user();
        $time_line_post->title=$request->title;
        $time_line_post->body=$request->body;
        // $time_line_post->user_id=$user->id;
        $time_line_post->time_line_id=DB::table('time_lines')->where('team_id',$team->id)->first();
        // $time_line_post->save();

        
        return redirect('/teams/time_lines/index')->with(['team'=>$team ]);
        
    }
}