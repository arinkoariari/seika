<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $questall->title }}
        </h1>
        <div class="content">
            <div class="content__questall">
                <h3>本文</h3>
                <p>{{ $questall->body }}</p>    
            </div>
        </div>
        @foreach ($answers as $answer)
                <div class='answer'>
                    <h2>from{{ $answer->user->name }}</h2>
                        <h3 class='title'>
                        <p>{{ $answer->title }}</p>
                        </h3>
                    <p class='body'>{{ $answer->body }}</p>
                    <form action="/answer/{{ $answer->id }}" id="form_{{ $answer->id }}" method="post">
                        @csrf
                </div>
        @endforeach
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>