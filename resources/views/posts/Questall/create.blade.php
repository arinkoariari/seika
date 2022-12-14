<x-app-layout>
    <x-slot name="header">
        　laravel
    </x-slot>
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>質問作成</h1>
        <form action="/quest" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="questall[title]" placeholder="タイトル"value="{{ old('questall.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('questall.title') }}</p>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="questall[body]" placeholder="サムネのフォントを教えてください。">{{ old('questall.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('questall.body') }}</p>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
</x-app-layout>
