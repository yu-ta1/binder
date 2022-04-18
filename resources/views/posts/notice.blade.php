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
                @if(($team->users()->pluck('role','user_id')->contains('オーナー','Auth::user()->id')))
                    <form action="/posts/create" method="GET">
                        @csrf
                        <input type="submit" value="投稿">
                    </form>
                @endif
            </div>
            @foreach ($notices as $notice)
                <div class="posts" style="padding: 10px; margin-bottom: 10px; border: 2px solid #333333;">
                    {{$notice->user_id}}
                    <p class="body">
                        {{$notice->Body}}
                    </p>
                    <P class='updated_at'>
                        {{$notice->updated_at}}
                    </P>
                </div>
            @endforeach
        </div>
    </body>
</html>
@endsection