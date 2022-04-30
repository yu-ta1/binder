@extends('layouts.homes.sidebar')
@extends('layouts.app')

@section('contents')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Binder</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="main" style="padding: 10px; margin-bottom: 10px; border: 2px solid #333333;">
            <div style="padding: 10px; margin: 10px; border: 3px solid #333333;">
                <h1>チーム探し</h1>
            </div>
            
            <form class="form_team_search" action="/homes/search" method="GET">
                @csrf
                <input type="text" name="keyword" value="{{$keyword}}" placeholder="「キーワード」検索"/>
                <input type="submit" value="検索"/>
            </form>
            
            @foreach ($teams as $team)
                <div class="teams" style="padding: 10px; margin-bottom: 10px; border: 2px solid #333333;">
                    <form method="POST" action="/homes/join">
                        @csrf
                        <p class="name">{{ $team->name }}</p>
                        <p>参加メンバー{{$team->users()->count()}}人</p>
                        @if(!($team->users()->pluck('user_id')->contains(Auth::user()->id)))
                            <button type="submit" name="team_id" value="{{$team->id}}">参加</button>
                        @endif
                    </form>
                </div>
            @endforeach
            
        </div>
    </body>
</html>
@endsection