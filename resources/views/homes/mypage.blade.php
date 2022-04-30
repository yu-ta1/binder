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
                <h1>マイページ</h1>
            </div>
            <div class="team_index">
                <div  style="padding: 10px; margin: 10px ; border: 3px solid #333333;">
                    <h3>チーム一覧</h3>
                    <form action="/homes/create" method="GET">
                        @csrf
                        <input type="submit" value="チーム作成">
                    </form>
                    @foreach ($teams as $team)
                        @if(($team->users()->pluck('user_id')->contains(Auth::user()->id)))
                            <ul class="teams">
                                <li><a href="/teams/{{$team->id}}/notices/index" value="{{$team->id}}">{{$team->name}}</li>
                            </ul>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
@endsection