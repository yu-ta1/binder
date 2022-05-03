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
                        <input class="form_team_search" type="text" name="name" placeholder="チーム名" value="{{ old('team.name') }}"/>
                        <p class="name_error" style="color:red">{{ $errors->first('team.name') }}</p>
                        <input class="form_team_search2" type="submit" value="作成"/>
                    </form>
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