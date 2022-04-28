<?php

namespace App\Http\Controllers;

use App\User;
use App\Team;
use App\Post;
use App\Notice;
use App\Notice_Post;
use App\Notice_Post_Comment;
use App\Time_Line;
use App\Time_Line_Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function notice(Team $team, Notice_Post $notice_post)
    {
        $notice=$team->notices()->first();
        return view('teams/notices/index')->with(['team'=>$team,'notice_posts'=>$notice_post->getPaginateByLimit($notice->id)]);
    }
    
    public function time_line(Team $team, Time_Line_Post $time_line_post)
    {
        $time_line=$team->time_lines()->first();
        return view('teams/time_lines/index')->with(['team'=>$team,'time_line_posts'=>$time_line_post->getPaginateByLimit($time_line->id)]);
    }
    
    public function notice_create(Team $team)
    {
        return view('teams/notices/create')->with(['team'=>$team ]);
    }
    
    public function time_line_create(Team $team)
    {
        return view('teams/time_lines/create')->with(['team'=>$team ]);
    }
    
    public function notice_store(Request $request, Notice_Post $notice_post, Team $team)
    {
        
        $user=Auth::user();
        $notice_post->title=$request['post']['title'];
        $notice_post->body=$request['post']['body'];
        $notice_post->user_id=$user->id;
        $notice_post->notice_id=DB::table('notices')->where('team_id',$team->id)->first()->id;
        $notice_post->save();
        
        return redirect('/teams/'.$team->id.'/notices/index');
        
    }
    
    public function time_line_store(Request $request, Time_Line_Post $time_line_post, Team $team)
    {
        
        $user=Auth::user();
        $time_line_post->title=$request['post']['title'];
        $time_line_post->body=$request['post']['body'];
        $time_line_post->user_id=$user->id;
        $time_line_post->time_line_id=DB::table('time_lines')->where('team_id',$team->id)->first()->id;
        $time_line_post->save();
        
        return redirect('/teams/'.$team->id.'/time_lines/index');
        
    }
    
    public function notice_show(Team $team, Notice_Post $notice_post)
    {
        $notice_post_comments=DB::table('notice_post_comments')->where('notice_post_id',$notice_post->id)->get();
        return view('teams/notices/show')->with(['team'=>$team,'notice_post'=>$notice_post,'notice_post_comments'=>$notice_post_comments]);
    }
    
    public function time_line_show(Team $team, Time_Line_Post $time_line_post)
    {
        $time_line_post_comments=DB::table('time_line_post_comments')->where('time_line_post_id',$time_line_post->id)->get();
        return view('teams/time_lines/show')->with(['team'=>$team,'time_line_posts'=>$time_line_post,'time_line_post_comments'=>$time_line_post_comments]);
    }
    
    public function notice_comment(Request $request, Team $team, Notice_Post $notice_post, Notice_Post_Comment $notice_post_comment)
    {
        $user=Auth::user();
        $notice_post_comment->body=$request['comment']['body'];
        $notice_post_comment->user_id=$user->id;
        $notice_post_comment->notice_post_id=$notice_post->id;
        $notice_post_comment->save();
        
        return redirect('/teams/'.$team->id.'/notice_posts/'.$notice_post->id.'/show');
    }
}