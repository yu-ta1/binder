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
                <section class="sidebar">
                    <ul class="sidebar-menu">
                        <li><a href="/teams/mypage">マイページ</li>
                        <li><a href="/teams/search">チーム探し</a></li>
                    </ul>
                </section>
            </aside>
            <div class="mainpage">
                <h1>@yield('content')</h1>
            </div>
        </div>
    </body>
</html>