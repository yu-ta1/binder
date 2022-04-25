<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function team(Team $team)
    {
        return view('layouts/teams/sidebar')->with(['team'=>$team]);
    }
}