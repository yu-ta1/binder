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
                <form action="/teams/{{$team->id}}/notices/create" method="GET">
                    @csrf
                    <input class="form_team_search2" type="submit" value="投稿">
                </form>
            </div>
            <div class="post_boxs">
                <div class="posts">
                    <p class="user_name">
                        {{DB::table('users')->where('id',$time_line_post->user_id)->first()->name}}
                    </p>
                    <p class="title">
                        {{$time_line_post->title}}
                    </p>
                    <p class="body">
                        {{$time_line_post->body}}
                    </p>
                    <P class='updated_at'>
                        {{$time_line_post->updated_at}}
                    </P>
                    <P class='comment'>
                        コメント{{DB::table('time_line_post_comments')->where('time_line_post_id',$time_line_post->id)->count()}}
                    </P>
                    <form action="/teams/{{$team->id}}/time_line_posts/{{$time_line_post->id}}/goods" method="POST">
                        @csrf
                        <P class='good'>
                            <input type="submit" value="いいね"/>{{DB::table('time_line_post_goods')->where('time_line_post_id',$time_line_post->id)->count()}}
                        </P>
                    </form>
                </div>
                <div>
                    <form action="/teams/{{$team->id}}/time_line_posts/{{$time_line_post->id}}/comments" method="POST">
                        @csrf
                        <div class="body">
                            <textarea name="comment[body]" placeholder="コメント">{{ old('comment.body') }}</textarea>
                            <p class="body__error" style="color:red">{{ $errors->first('comment.body') }}</p>
                            <input type="submit" value="送信"/>
                            <div class="back"><p>[<a href="/teams/{{$team->id}}/time_lines/index">タイムラインに戻る</a>]</p></div>
                        </div>
                    </form>
                </div>
                <div class="comment_index">
                    @foreach ($time_line_post_comments as $time_line_post_comment)
                        <div class="comment_box">
                            <p class="user_name2">
                                {{DB::table('users')->where('id',$time_line_post_comment->user_id)->first()->name}}
                            </p>
                            <p class="comment_body">
                                {{$time_line_post_comment->body}}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
@endsection