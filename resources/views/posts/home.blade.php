<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>home</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
 <body>
        <h1>youtube切り抜きコミュニティ</h1>
        <a href='/mypage'>mypage</a>
        <a href='/quest/create'>みんなに質問する</a>
        <div class='questsall'>
            @foreach ($questsalls as $questall)
                <div class='questsall'>
                    <h2>{{ $questall->user->name }}の質問</h2>
                        <h3 class='title'>
                        <a href="/quest/{{ $questall->id }}">{{ $questall->title }}</a>
                        </h3>
                    <p class='body'>{{ $questall->body }}</p>
                    <form action="/quest/{{ $questall->id }}" id="form_{{ $questall->id }}" method="post">
                        @csrf
                </div>
                <button onclick="like({{$questall->id}})">いいね</button>
                <a href='/answerforalls/create'>返信する</a>
                @foreach ($answerforalls as $answerforall)
                    <div class='answer'>
                        <h2>from{{ $answerforall->user->name }}</h2>
                            <h3 class='title'>
                            <p>{{ $answerforall->title }}</p>
                            </h3>
                        <p class='body'>{{ $answerforall->body }}</p>
                        <form action="/answerforalls/{{ $answerforall->id }}" id="form_{{ $answerforall->id }}" method="post">
                            @csrf
                    </div>
                    <form action="/answerforalls/{{ $answerforall->id }}" id="form_{{ $answerforall->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $answerforall->id }})">answer delete</button> 
                    </form>
                @endforeach
                <form action="/quest/{{ $questall->id }}" id="form_{{ $questall->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $questall->id }})"> question delete</button> 
                </form>
            @endforeach
        </div>
        <div class='paginate'>
            {{  $questsalls->links() }}
        </div>
    </body>
    <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
</html>
