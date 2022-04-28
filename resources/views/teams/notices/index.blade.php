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
                <h1>おしらせ</h1>
                @if(DB::table('team_user')->where('team_id',$team->id)->where('user_id',Auth::user()->id)->first()->role == 'オーナー')
                    <form action="/teams/{{$team->id}}/notices/create" method="GET">
                        @csrf
                        <input type="submit" value="投稿">
                    </form>
                @endif
            </div>
            <div>
            @foreach ($notice_posts as $notice_post)
                <div class="posts" style="padding: 10px; margin-bottom: 10px; border: 2px solid #333333;">
                    <p class="title">
                        <a href="/teams/{{$team->id}}/notice_posts/{{$notice_post->id}}/show" value="{{$notice_post->id}}">
                        {{$notice_post->title}}
                    </p>
                    <p class="body">
                        {{$notice_post->body}}
                    </p>
                    <P class='updated_at'>
                        {{$notice_post->updated_at}}
                    </P>
                    <P class='comment'>
                        コメント{{DB::table('notice_post_comments')->where('notice_post_id',$notice_post->id)->count()}}
                    </P>
                    <P class='good'>
                        いいね{{DB::table('notice_post_goods')->where('notice_post_id',$notice_post->id)->count()}}
                    </P>
                </div>
            @endforeach
            </div>
            <div class='paginate'>
                {{ $notice_posts->links() }}
            </div>
        </div>
    </body>
</html>
@endsection