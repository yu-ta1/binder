@extends('layouts.posts.sidebar')

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
                <form action="/posts/create" method="GET">
                    @csrf
                    <input type="submit" value="投稿">
                </form>
            </div>
            @foreach ($time_lines as $time_line)
                <div class="posts" style="padding: 10px; margin-bottom: 10px; border: 2px solid #333333;">
                    <p class="body">
                        {{$time_line->Body}}
                    </p>
                    <P class='updated_at'>
                        {{$time_line->updated_at}}
                    </P>
                </div>
            @endforeach
        </div>
    </body>
</html>
@endsection