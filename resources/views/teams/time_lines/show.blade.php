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
                @if($time_line_post->user_id === Auth::user()->id)
                    <form action="/teams/{{$team->id}}/time_line_posts/{{$time_line_post->id}}/delete" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="form_team_search2" type="submit" onClick="return Check()" value="投稿削除"/>
                    </form>
                @endif
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
                    @if(DB::table('time_line_post_goods')->where('time_line_post_id',$time_line_post->id)->where('user_id',Auth::user()->id)->doesntExist())
                        <form action="/teams/{{$team->id}}/time_line_posts/{{$time_line_post->id}}/goods" method="POST">
                            @csrf
                            <P class='good'>
                                <button class='good2' type="submit">♡いいね</button>{{DB::table('time_line_post_goods')->where('time_line_post_id',$time_line_post->id)->count()}}
                            </P>
                        </form>
                    @else
                        <form action="/teams/{{$team->id}}/time_line_posts/{{$time_line_post->id}}/goods" method="POST">
                            @csrf
                            <P class='good'>
                                <button class="good3" type="submit">♥いいね</button>{{DB::table('time_line_post_goods')->where('time_line_post_id',$time_line_post->id)->count()}}
                            </P>
                        </form>
                    @endif
                </div>
                <div>
                    <form action="/teams/{{$team->id}}/time_line_posts/{{$time_line_post->id}}/comments" method="POST">
                        @csrf
                        <div class="body">
                            <textarea name="comment[body]" placeholder="コメント">{{ old('comment.body') }}</textarea>
                            <p class="body_error">{{ $errors->first('comment.body') }}</p>
                            <input type="submit" value="送信"/>
                            <div class="back"><p>[<a href="/teams/{{$team->id}}/time_lines/index">タイムラインに戻る</a>]</p></div>
                        </div>
                    </form>
                </div>
                <div class="comment_index">
                    @foreach ($time_line_post_comments as $time_line_post_comment)
                        <div class="comment_box">
                            @if($time_line_post_comment->user_id === Auth::user()->id)
                                <form action="/teams/{{$team->id}}/time_line_posts/{{$time_line_post->id}}/comments/{{$time_line_post_comment->id}}/delete" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="delete_button" type="submit" onClick="return Check()" value="削除"/>
                                </form>
                            @endif
                            <p class="user_name2">
                                {{DB::table('users')->where('id',$time_line_post_comment->user_id)->first()->name}}
                            </p>
                            <p class="comment_body">
                                {{$time_line_post_comment->body}}
                            </p>
                            <p class="updated_at">
                                {{$time_line_post_comment->updated_at}}
                            </p>
                            <p Class="adjustment"></p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function Check(){
                var checked = confirm("本当に削除しますか？");
                if (checked == true) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    </body>
</html>
@endsection