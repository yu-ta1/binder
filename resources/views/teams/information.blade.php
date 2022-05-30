@extends('layouts.teams.sidebar')
@extends('layouts.app')
@section('team',$team)
@section('contents')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Binder</title>
        <link rel="stylesheet" href="{{ asset('css/homes.css') }}">
        <link rel="stylesheet" href="{{ asset('css/teams.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="main">
            <div class="main_title">
                <h1 class="main_title_name">{{$team->name}}</h1>
                <p class="overview2">
                    {{$team->overview}}
                </p>
            </div>
            <div class="post_boxs">
                <div class="posts">
                    <p class="member_index" align="center">
                        メンバー表
                    </p>
                    <table class="rows" border="1" align="center">
                        <tr align="center">
                            <th class="th1">ニックネーム</th>
                            <th class="th1">権限</th>
                        </tr>
                        @foreach($users as $user)
                            @if(($user->teams()->pluck('team_id')->contains($team->id)))
                            <tr align="center">
                                <td class="td1">{{$user->name}}</td>
                                <td class="td1">{{DB::table('team_user')->where('team_id',$team->id)->where('user_id',$user->id)->first()->role}}</td>
                            </tr>
                            @endif
                        @endforeach
                    </table>
                </div>    
            </div>
        </div>
    </body>
</html>
@endsection