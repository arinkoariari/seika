<x-app-layout>
    <x-slot name="header">
        　laravel
    </x-slot>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>mypage</title>
        <!-- Fonts -->
        <!--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">-->
    </head>
 <body>
        <a href='/'>youtube切り抜きコミュニティ</a>
        <p>username:{{ Auth::user()->name }}<p>
        <a href='/mypage'>mypage</a>
        <h1>あなたのブログ</h1>
        <div class='posts'>
             <a href='/mypage/posts/create'>create blog</a>
            @foreach ($posts as $post)
                <div class='post'>
                        <h2 class='title'>
                        <a href="/mypage/posts/{{ $post->id }}">{{ $post->title }}</a>
                        </h2>
                    <p class='body'>{{ $post->body }}</p>
                    <form action="/mypage/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a  onclick="deletePost({{ $post->id }})">delete</a> 
                    </form>
                </div>
            @endforeach
        </div>
         <div class='paginate'>
            {{ $posts->links() }}
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
         
    </body>
    </x-app-layout>
    