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
                    <h3 class="sub_title">チーム作成</h3>
                    <form action="/teams" method="POST">
                        @csrf
                        <div class="team_index3">
                            <h3 class="title2">チーム名</h3>
                            <input class="form_team_search" type="text" name="name" placeholder="チーム名" value="{{ old('name') }}"/>
                            <p class="title_error">{{ $errors->first('name') }}</p>
                            <h3  class="title2">概要</h3>
                            <textarea class="form_team_search" name="overview" placeholder="概要">{{ old('overview') }}</textarea>
                            <p class="body_error">{{ $errors->first('overview') }}</p>
                            <div class="form_team_search2"><input type="submit" value="作成"/></div>
                        </div>
                    </form>
                    <div class="team_box">
                        @foreach ($teams as $team)
                            @if(($team->users()->pluck('user_id')->contains(Auth::user()->id)))
                                <div class="team">
                                    <ul>
                                        <li><a href="/teams/{{$team->id}}/notices/index" value="{{$team->id}}">{{$team->name}}</a></li>
                                    </ul>
                                    <p class="overview">概要：<br>{{$team->overview}}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection