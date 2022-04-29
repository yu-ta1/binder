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
            <aside class="main-sidebar" style="padding: 10px; margin-bottom: 10px; border: 2px solid #333333;">
                <div style="padding: 10px; margin: 10px ; border: 3px solid #333333;">{{$team->name}}</div>
                <section class="sidebar">
                    <ul class="sidebar-menu">
                        <br>
                        <li><a href="/homes/mypage">マイページ</a></li>
                        <li><a href="/homes/search">チーム探し</a></li>
                        <br>
                        <li><a href="/teams/{{$team->id}}/notices/index">おしらせ</a></li>
                        <li><a href="/teams/{{$team->id}}/time_lines/index">タイムライン</a></li>
                    </ul>
                </section>
            </aside>
            <div class="mainpage">
                <h1>@yield('content')</h1>
            </div>
        </div>
    </body>
</html>