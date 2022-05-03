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
                <h1 class="main_title_name">投稿作成画面</h1>
            </div>
            <div>
                <form action="/teams/{{$team->id}}/notices/store" method="POST">
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
                    <input class="button2" type="submit" value="投稿"/>
                </form>
                <div class="back"><p>[<a href="/teams/{{$team->id}}/notices/index">おしらせに戻る</a>]</p></div>
            </div>
        </div>
    </body>
</html>
@endsection