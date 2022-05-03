@extends('layouts.homes.sidebar')
@extends('layouts.app')

@section('contents')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Binder</title>
        <link rel="stylesheet" href="{{ asset('css/homes.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="main">
            <div class="main_title">
                <h1 class="main_title_name">マイページ</h1>
            </div>
            <div class="team_index">
                <div  class="team_index2">
                    <form action="/homes/create" method="GET">
                        @csrf
                        <input class="button" type="submit" value="チーム作成">
                    </form>
                    <h3 class="sub_title">チーム一覧</h3>
                    <div class="team_box">
                        @foreach ($teams as $team)
                            @if(($team->users()->pluck('user_id')->contains(Auth::user()->id)))
                                <ul class="team">
                                    <li><a href="/teams/{{$team->id}}/notices/index" value="{{$team->id}}">{{$team->name}}</li>
                                </ul>
                            @endif
                        @endforeach
                    </div>    
                </div>
            </div>
        </div>
    </body>
</html>
@endsection