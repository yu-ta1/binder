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
                    <h3 class="sub_title">チーム探し</h3>
                    <form action="/homes/search" method="GET">
                        @csrf
                        <input class="form_team_search" type="text" name="keyword" value="{{$keyword}}" placeholder="「キーワード」検索"/>
                        <input class="form_team_search2" type="submit" value="検索"/>
                    </form>
                    <div class="team_box">
                        @foreach ($teams as $team)
                            <div class="team">
                                <form method="POST" action="/homes/join">
                                    @csrf
                                    <p class="name">チーム名：{{ $team->name }}</p>
                                    <p class="name">参加メンバー：{{$team->users()->count()}}人</p>
                                    <p class="name_overview">概要：<br>{{$team->overview}}</p>
                                    @if(!($team->users()->pluck('user_id')->contains(Auth::user()->id)))
                                        <button class="button2" type="submit" name="team_id" value="{{$team->id}}">参加</button>
                                    @endif
                                </form>
                                <form method="POST" action="/homes/{{$team->id}}/exit">
                                    @csrf
                                    @method('DELETE')
                                    @if(($team->users()->pluck('user_id')->contains(Auth::user()->id)))
                                        <button class="button2" type="submit" name="team_id" value="{{$team->id}}" onClick="return Check()">退会</button>
                                    @endif
                                </form>
                            </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function Check(){
                var checked = confirm("本当に退会しますか？");
                if (checked == true) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
</html>
@endsection