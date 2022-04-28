@extends('layouts.teams.sidebar')
@section('team',$team)
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
                <h1>タイムライン</h1>
                @if(DB::table('team_user')->where('team_id',$team->id)->where('user_id',Auth::user()->id)->first()->role == 'オーナー')
                    <form action="/teams/{{$team->id}}/notices/create" method="GET">
                        @csrf
                        <input type="submit" value="投稿">
                    </form>
                @endif
            </div>
            <div>
                <div class="posts" style="padding: 10px; margin-bottom: 10px; border: 2px solid #333333;">
                    <p class="title">
                        {{$time_line_posts->title}}
                    </p>
                    <p class="body">
                        {{$time_line_posts->body}}
                    </p>
                    <P class='updated_at'>
                        {{$time_line_posts->updated_at}}
                    </P>
                    <P class='comment'>
                        コメント{{DB::table('notice_post_comments')->where('notice_post_id',$time_line_posts->id)->count()}}
                    </P>
                    <P class='good'>
                        いいね{{DB::table('notice_post_goods')->where('notice_post_id',$time_line_posts->id)->count()}}
                    </P>
                </div>
                @foreach ($time_line_post_comments as $time_line_post_comment)
                    <div class="posts" style="padding: 10px; margin-bottom: 10px; border: 2px solid #333333;">
                        <p>
                            {{$time_line_post_comment->body}}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
@endsection