@extends('layouts.teams.sidebar')
@extends('layouts.app')
@section('team',$team)
@section('contents')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Binder</title>
        <link rel="stylesheet" href="{{ asset('css/homes.css') }}">
        <link rel="stylesheet" href="{{ asset('css/teams.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="main">
            <div class="main_title">
                <h1 class="main_title_name">タイムライン</h1>
                <form action="/teams/{{$team->id}}/time_lines/create" method="GET">
                    @csrf
                    <input class="form_team_search2" type="submit" value="投稿">
                </form>
            </div>
            <div class="post_boxs">
                @foreach ($time_line_posts as $time_line_post)
                    <div class="posts">
                        <p class="title">
                            <a href="/teams/{{$team->id}}/time_line_posts/{{$time_line_post->id}}/show" value="{{$time_line_post->id}}">
                                {{$time_line_post->title}}
                            </a>
                        </p>
                        <p class="body">
                            {{$time_line_post->body}}
                        </p>
                        <P class='updated_at'>
                            {{$time_line_post->updated_at}}
                        </P>
                        <form action="/teams/{{$team->id}}/time_line_posts/{{$time_line_post->id}}/show" method="GET">
                            @csrf
                            <P class='comment'>
                                <input type="submit" value="コメント"/>{{DB::table('time_line_post_comments')->where('time_line_post_id',$time_line_post->id)->count()}}
                            </P>
                        </form>
                        <form action="/teams/{{$team->id}}/time_line_posts/{{$time_line_post->id}}/goods" method="POST">
                            @csrf
                            <P class='good'>
                                <input type="submit" value="いいね"/>{{DB::table('time_line_post_goods')->where('time_line_post_id',$time_line_post->id)->count()}}
                            </P>
                        </form>
                    </div>
                @endforeach
            </div>
            <div class='paginate'>
                {{ $time_line_posts->links() }}
            </div>
        </div>
    </body>
</html>
@endsection