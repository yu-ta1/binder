<?php

namespace App\Http\Controllers;

use App\User;
use App\Team;
use App\Post;
use App\Notice;
use App\Notice_Post;
use App\Notice_Post_Comment;
use App\Notice_Post_Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NoticePostController extends Controller
{
    public function notice(Team $team, Notice_Post $notice_post)
    {
        $notice=$team->notices()->first();
        return view('teams/notices/index')->with(['team'=>$team,'notice_posts'=>$notice_post->getPaginateByLimit($notice->id)]);
    }
    
    public function notice_create(Team $team)
    {
        return view('teams/notices/create')->with(['team'=>$team ]);
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
    
    public function notice_show(Team $team, Notice_Post $notice_post)
    {
        $notice_post_comments=DB::table('notice_post_comments')->where('notice_post_id',$notice_post->id)->get();
        return view('teams/notices/show')->with(['team'=>$team,'notice_post'=>$notice_post,'notice_post_comments'=>$notice_post_comments]);
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
    
    public function notice_good(Request $request, Team $team, Notice_Post $notice_post, Notice_Post_Good $notice_post_good)
    {
        $user=Auth::user();
        if(DB::table('notice_post_goods')->where('notice_post_id',$notice_post->id)->where('user_id',$user->id)->doesntExist()){
            $notice_post_good->user_id=$user->id;
            $notice_post_good->notice_post_id=$notice_post->id;
            $notice_post_good->save();
        }else{
            // $good_delete=DB::table('notice_post_goods')->where('notice_post_id',$notice_post->id)->where('user_id',$user->id)->first();
            $good_delete=Notice_Post_Good::where('notice_post_id',$notice_post->id)->where('user_id',$user->id)->first();
            $good_delete->delete();
        }
        return redirect('/teams/'.$team->id.'/notice_posts/'.$notice_post->id.'/show');
    }
}
