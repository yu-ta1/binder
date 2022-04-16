<?php

namespace App\Http\Controllers;

use App\User;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function mypage(Team $team)
    {
        return view('/teams/mypage')->with(['teams' => $team->get()]);  
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
        
        return view('/teams/search',compact('teams','keyword'));
    }
    
    public function join(Team $team,Request $request)
    {
        $user=Auth::user();
        $user->teams()->attach($request->input('team_id'),['role'=>'メンバー']);
        
        return view('/teams/search')->with(['teams' => $team->get()]);
    }
    
}