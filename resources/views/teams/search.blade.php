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
            <form>
                @csrf
                <input type=text placeholder="「チーム名」もしくは「キーワード」検索">
                <input type=submit value="検索">
            </form>
            @foreach ($teams as $team)
                <div class="team">
                    <p>{{ $team->name }}</p>
                    <form>
                        @csrf
                        <input type=submit value="参加">
                    </from>
                </div>
            @endforeach
        </div>
    </body>
</html>
@endsection