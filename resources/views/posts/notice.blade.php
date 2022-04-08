@extends('layouts.teams.sidebar')

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
                <from>
                    @csrf
                    <input type="submit" value="投稿">
                </form>
            </div>
            @foreach ($notices as $notice)
                <div class="posts" style="padding: 10px; margin-bottom: 10px; border: 2px solid #333333;">
                    <p>ユーザー名</p>
                    <p class="body">
                        ここにbody
                    </p>
                    <P class='updated_at'>
                        ここに時間
                    </P>
                </div>
            @endforeach
        </div>
    </body>
</html>
@endsection