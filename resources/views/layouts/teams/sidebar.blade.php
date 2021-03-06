<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>binder</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="wrapper clearfix">
            <aside class="main-sidebar" style="padding: 10px; margin-bottom: 10px; border-right: 2px solid #333333;">
                <div class="team_name">
                    <a href="/teams/{{$team->id}}/information">{{$team->name}}</a>
                    <p class="overview">
                        {{$team->overview}}
                    </p>
                </div>
                <section class="sidebar">
                    <ul class="sidebar-menu">
                        <br>
                        <li class="menu"><a href="/homes/mypage">マイページ</a></li>
                        <li class="menu"><a href="/homes/search">チーム探し</a></li>
                        <li class="menu"><a href="/homes/create">チーム作成</a></li>
                        <br>
                        <li class="menu"><a href="/teams/{{$team->id}}/notices/index">おしらせ</a></li>
                        <li class="menu"><a href="/teams/{{$team->id}}/time_lines/index">タイムライン</a></li>
                    </ul>
                </section>
            </aside>
            <div class="mainpage">
                <h1>@yield('contents')</h1>
            </div>
        </div>
    </body>
</html>