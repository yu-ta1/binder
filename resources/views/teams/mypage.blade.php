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
            <div style="padding: 10px; margin: 10px ; border: 3px solid #333333;">
                <h1>マイページ</h1>
            </div>
            <div style="padding: 10px; margin: 10px ; border: 3px solid #333333;">
                <h3>チーム一覧</h3>
                <from>
                    @csrf
                    <input type="submit" value="チーム作成">
                </form>
            </div>
            @foreach ($teams as $team)
                @if(($team->users()->pluck('id')->contains(Auth::user()->id)))
                    <ul class="teams">
                        <li><a href="/posts/{{$team->id}}" value="{{$team->id}}">{{$team->name}}</li>
                    </ul>
                @endif
            @endforeach
        </div>
    </body>
</html>
@endsection