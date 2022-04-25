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
                <h1>投稿作成画面</h1>
            </div>
        </div>
        <div style="padding: 10px; margin-bottom: 10px; border: 2px solid #333333;">
            <form action="/teams/{{$team->id}}/time_lines/create" method="POST">
                @csrf
                <div class="title">
                    <h3>Title</h3>
                    <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                </div>
                <div class="body">
                    <h3>Body</h3>
                    <textarea name="post[body]" placeholder="投稿内容">{{ old('post.body') }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                <input type="submit" value="保存"/>
            </form>
            <div class="back"><p>[<a href="/teams/{{$team->id}}/time_lines/index">タイムラインに戻る</a>]</p></div>
        </div>
    </body>
</html>
@endsection