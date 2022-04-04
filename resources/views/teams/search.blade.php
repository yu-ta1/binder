@extends('layouts.teams.sidebar')

@section('content')
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
            
            <from class="from_team_search" action="{{url('/teams')}}" meshod="GET">
                @csrf
                <input type=text name="search" value="{{$keyword}}" placeholder="「キーワード」検索">
                <input type=submit value="検索">
            </form>
            
            @foreach ($teams as $team)
                <div class="teams" style="padding: 10px; margin-bottom: 10px; border: 2px solid #333333;">
                    <form method="POST" action="/team/join">
                        @csrf
                        <p class="name">{{ $team->name }}</p>
                        <p>参加メンバー{{$team->users()->count()}}人</p>
                        @if(!($team->users()->pluck('id')->contains(Auth::user()->id)))
                            <button type="submit" name="team_id" value="{{$team->id}}">参加</button>
                        @endif
                    </from>
                </div>
            @endforeach
            
        </div>
    </body>
</html>
@endsection