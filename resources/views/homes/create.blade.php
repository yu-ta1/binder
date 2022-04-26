@extends('layouts.homes.sidebar')

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
            <div class="title" style="padding: 10px; margin: 10px ; border: 3px solid #333333;">
                <h3>チーム作成</h3>
                <p>チーム名</p>
                <form action="/teams" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="チーム名" value="{{ old('team.name') }}"/>
                    <p class="name_error" style="color:red">{{ $errors->first('team.name') }}</p>
                    <input type="submit" value="保存"/>
                </form>
            </div>
            @foreach ($teams as $team)
                @if(($team->users()->pluck('user_id')->contains(Auth::user()->id)))
                    <ul class="teams">
                        <li><a href="/teams/{{$team->id}}/notices/index" value="{{$team->id}}">{{$team->name}}</li>
                    </ul>
                @endif
            @endforeach
        </div>
    </body>
</html>
@endsection