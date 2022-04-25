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
        
        return view('/homes/search')->with(['teams' => $team->get()]);
    }
    
    public function store(Request $request, Team $team)
    {
        // $input = $request['team'];
        // $team->fill($input)->save();
        // $user=Auth::user();
        // $user->teams()->attach($request->input('team_id'),['role'=>'オーナー']);
        // return redirect('/teams/' . $team->id);
        
        $input = $request['team'];
        $user=Auth::user();
        $team->name=$input;
        $team->user_id=$user->id;
        $team->save();
        
        $user->teams()->attach($request->input('team_id'),['role'=>'オーナー']);
        
        // $input = $request['team'];
        // $user=Auth::user()->id;
        
        // Team::create([
        //     'name' => $input,
        //     'user_id' => $user,
        // ]);
        
        return redirect('/homes/mypage');
        
    }
    
}