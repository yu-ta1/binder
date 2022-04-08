<?php

namespace App\Http\Controllers;

use App\User;
use App\Team;
use App\Post;
use App\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function notice(Notice $notice)
    {
        return view('/posts/notice')->with(['notices' => $notice_post->get()]);
    }
}