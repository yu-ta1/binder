<?php

namespace App\Http\Controllers;

use App\User;
use App\Team;
use App\Post;
use App\Time_Line;
use App\Time_Line_Post;
use App\Time_Line_Post_Comment;
use App\Time_Line_Post_Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TimeLinePostController extends Controller
{
    
    public function time_line(Team $team, Time_Line_Post $time_line_post)
    {
        $time_line=$team->time_lines()->first();
        return view('teams/time_lines/index')->with(['team'=>$team,'time_line_posts'=>$time_line_post->getPaginateByLimit($time_line->id)]);
    }
    
    public function time_line_create(Team $team)
    {
        return view('teams/time_lines/create')->with(['team'=>$team ]);
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
    
    public function time_line_show(Team $team, Time_Line_Post $time_line_post)
    {
        $time_line_post_comments=DB::table('time_line_post_comments')->where('time_line_post_id',$time_line_post->id)->get();
        return view('teams/time_lines/show')->with(['team'=>$team,'time_line_post'=>$time_line_post,'time_line_post_comments'=>$time_line_post_comments]);
    }
    
    public function time_line_delete(Request $request, Team $team, Time_Line_Post $time_line_post)
    {
        if(!DB::table('time_line_post_comments')->where('time_line_post_id',$time_line_post->id)->doesntExist()){
            DB::table('time_line_post_comments')->where('time_line_post_id',$time_line_post->id)->delete();
        }
        
        $time_line_post_delete=Time_Line_Post::where('id',$time_line_post->id)->first();
        $time_line_post_delete->delete();
        
        return redirect('/teams/'.$team->id.'/time_lines/index');
    }
    
    public function time_line_comment(Request $request, Team $team, Time_Line_Post $time_line_post, Time_Line_Post_Comment $time_line_post_comment)
    {
        $user=Auth::user();
        $time_line_post_comment->body=$request['comment']['body'];
        $time_line_post_comment->user_id=$user->id;
        $time_line_post_comment->time_line_post_id=$time_line_post->id;
        $time_line_post_comment->save();
        
        return redirect('/teams/'.$team->id.'/time_line_posts/'.$time_line_post->id.'/show');
    }
    
    public function time_line_good(Request $request, Team $team, Time_Line_Post $time_line_post, Time_Line_Post_Good $time_line_post_good)
    {
        $user=Auth::user();
        if(DB::table('time_line_post_goods')->where('time_line_post_id',$time_line_post->id)->where('user_id',$user->id)->doesntExist()){
            $time_line_post_good->user_id=$user->id;
            $time_line_post_good->time_line_post_id=$time_line_post->id;
            $time_line_post_good->save();
        }else{
            $good_delete=Time_Line_Post_Good::where('time_line_post_id',$time_line_post->id)->where('user_id',$user->id)->first();
            $good_delete->delete();
        }
        return redirect('/teams/'.$team->id.'/time_line_posts/'.$time_line_post->id.'/show');
    }
    
    public function comment_delete(Request $request, Team $team, Time_Line_Post $time_line_post, Time_Line_Post_Comment $time_line_post_comment)
    {
        $comment_delete=Time_Line_Post_Comment::where('id',$time_line_post_comment->id)->first();
        $comment_delete->delete();
        
        return redirect('/teams/'.$team->id.'/time_line_posts/'.$time_line_post->id.'/show');
    }
    
}
