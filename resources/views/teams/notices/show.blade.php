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
                        <input class="form_team_search2" type="submit" value="投稿">
                    </form>
                @endif
            </div>
            <div class="post_boxs">
                <div class="posts">
                    <p class="title">
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
                    <form action="/teams/{{$team->id}}/notice_posts/{{$notice_post->id}}/goods" method="POST">
                        @csrf
                        <P class='good'>
                            <input type="submit" value="いいね"/>{{DB::table('notice_post_goods')->where('notice_post_id',$notice_post->id)->count()}}
                        </P>
                    </form>
                </div>
                <div>
                    <form action="/teams/{{$team->id}}/notice_posts/{{$notice_post->id}}/comments" method="POST">
                        @csrf
                        <div class="body">
                            <textarea name="comment[body]" placeholder="コメント">{{ old('comment.body') }}</textarea>
                            <p class="body__error" style="color:red">{{ $errors->first('comment.body') }}</p>
                            <input type="submit" value="送信" onclick="check()"/>
                            <div class="back"><p>[<a href="/teams/{{$team->id}}/notices/index">おしらせに戻る</a>]</p></div>
                        </div>
                    </form>
                </div>
                <div class="comment_index">
                    @foreach ($notice_post_comments as $notice_post_comment)
                        <div class="comment_box">
                            <p class="comment_body">
                                {{$notice_post_comment->body}}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
    <script>
        function check() {
          let textValue = document.form.comment.value;
          textValue = textValue.split("\n").join("<br>");
    </script>
</html>
@endsection