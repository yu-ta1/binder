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
        return view('teams/mypage')->with(['teams' => $team->get()]);  
    }
    
    public function search(Team $team)
    {
        return view('teams/search')->with(['teams' => $team->get()]);  
    }
    
    public function join(Request $request)
    {
        $user=Auth::user();
        $user->teams()->attach($request->input('team_id'));
        
        return redirect('/teams/search');
    }
}