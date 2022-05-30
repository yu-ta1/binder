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
                <h1 class="main_title_name">おしらせ</h1>
                @if(DB::table('team_user')->where('team_id',$team->id)->where('user_id',Auth::user()->id)->first()->role == 'オーナー')
                    <form action="/teams/{{$team->id}}/notices/create" method="GET">
                        @csrf
                        <input class="form_team_search3" type="submit" value="投稿">
                    </form>
                @endif
            </div>
            <div class="post_boxs">
                @foreach ($notice_posts as $notice_post)
                    <div class="posts">
                        <p class="user_name">
                            {{DB::table('users')->where('id',$notice_post->user_id)->first()->name}}
                        </p>
                        <p class="title">
                            <a href="/teams/{{$team->id}}/notice_posts/{{$notice_post->id}}/show" value="{{$notice_post->id}}">
                                {{$notice_post->title}}
                            </a>
                        </p>
                        <p class="body">
                            {{$notice_post->body}}
                        </p>
                        <P class='updated_at'>
                            {{$notice_post->updated_at}}
                        </P>
                        <form action="/teams/{{$team->id}}/notice_posts/{{$notice_post->id}}/show" method="GET">
                            @csrf
                            <P class='comment'>
                                <button class='good2' type="submit">コメント</button>{{DB::table('notice_post_comments')->where('notice_post_id',$notice_post->id)->count()}}
                            </P>
                        </form>
                        @if(DB::table('notice_post_goods')->where('notice_post_id',$notice_post->id)->where('user_id',Auth::user()->id)->doesntExist())
                            <form action="/teams/{{$team->id}}/notice_posts/{{$notice_post->id}}/goods" method="POST">
                                @csrf
                                <P class='good'>
                                    <button class='good2' type="submit">♡いいね</button>{{DB::table('notice_post_goods')->where('notice_post_id',$notice_post->id)->count()}}
                                </P>
                            </form>
                        @else
                            <form action="/teams/{{$team->id}}/notice_posts/{{$notice_post->id}}/goods" method="POST">
                                @csrf
                                <P class='good'>
                                    <button class="good3" type="submit">♥いいね</button>{{DB::table('notice_post_goods')->where('notice_post_id',$notice_post->id)->count()}}
                                </P>
                            </form>
                        @endif
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