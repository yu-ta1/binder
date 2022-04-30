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
                        <br>
                        <li class"name"><a href="/homes/mypage">マイページ</a></li>
                        <li class"name"><a href="/homes/search">チーム探し</a></li>
                        <li class"name"><a href="/homes/create">チーム作成</a></li>
                    </ul>
                </section>
            </aside>
            <div class="mainpage">
                <h1>@yield('contents')</h1>
            </div>
        </div>
    </body>
</html>