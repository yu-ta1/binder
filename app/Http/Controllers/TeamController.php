<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminata\Support\Facades\Auth;

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
        $team=Team::find($request->input('team_id'));

        $team->users()->attach(Auth::id());
    }
}