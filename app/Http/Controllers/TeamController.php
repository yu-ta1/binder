<?php

namespace App\Http\Controllers;

use App\User;
use App\Team;
use App\Notice;
use App\Time_Line;
use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function mypage(Team $team)
    {
        return view('/homes/mypage')->with(['teams' => $team->get()]);  
    }
    
    public function search(Team $team, Request $request)
    {
        $teams=Team::all();
        $keyword=$request->input('keyword');
        $query=Team::query();
        if(!empty($keyword)){
            $query->where('name','LIKE',"%{$keyword}%");
        }
        $teams=$query->get();

        return view('/homes/search',compact('teams','keyword'));
    }
    
    public function create(Team $team)
    {
        return view('/homes/create')->with(['teams'=>$team->get()]);  
    }
    
    public function join(Team $team,Request $request)
    {
        $user=Auth::user();
        $user->teams()->attach($request->input('team_id'),['role'=>'メンバー']);
        
        return redirect('/homes/search');
    }
    
    public function exit(Team $team,Request $request)
    {
        $user=Auth::user();
        DB::table('team_user')->where('user_id',$user->id)->where('team_id',$team->id)->delete();
        
        return redirect('/homes/search');
    }
    
    public function store(TeamRequest $request, Team $team, Notice $notice, Time_Line $time_line)
    {
        $user=Auth::user();
        $team->name=$request['name'];
        $team->overview=$request['overview'];
        $team->user_id=$user->id;
        $team->save();
        
        $user->teams()->attach($team->id,['role'=>'オーナー']);
        
        $notice->team_id=$team->id;
        $notice->save();
        $time_line->team_id=$team->id;
        $time_line->save();
        
        return redirect('/homes/mypage');
    }
    
    public function information(Team $team,User $user)
    {
        return view('/teams/information')->with(['team'=>$team,'users'=>$user->get()]);  
    }
}