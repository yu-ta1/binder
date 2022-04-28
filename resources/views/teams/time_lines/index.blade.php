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
                <form action="/teams/{{$team->id}}/time_lines/create" method="GET">
                    @csrf
                    <input type="submit" value="投稿">
                </form>
            </div>
            @foreach ($time_line_posts as $time_line_post)
                <form>
                <div class="posts" style="padding: 10px; margin-bottom: 10px; border: 2px solid #333333;">
                    <p class="title">
                        <a href="/teams/{{$team->id}}/time_lines/show/{{$time_line_post->id}}" value="{{$time_line_post->id}}">
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
                    <P class='good'>
                        いいね{{DB::table('time_line_post_goods')->where('time_line_post_id',$time_line_post->id)->count()}}
                    </P>
                </div>
                </form>
            @endforeach
            <div class='paginate'>
                {{ $time_line_posts->links() }}
            </div>
        </div>
    </body>
</html>
@endsection