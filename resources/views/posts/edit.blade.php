<x-app-layout>
    <x-slot name="header">
        　laravel
    </x-slot>
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>編集画面</title>
    </head>
    <body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/mypage/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>タイトル</h2>
                <input type='text' name='post[title]' value="{{ $post->title }}">
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class='content__body'>
                <h2>本文</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ $post->body }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</body>
</html>
</x-app-layout>