<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>返信</title>
    </head>
    <body>
        <h1>返信</h1>
        <form action="/answerforalls" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="answerforall[title]" placeholder="好きなフォント" value="{{ old('answerforall.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('answerforall.title') }}</p>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="answerforall[body]" placeholder="限界明朝が好きです。">{{ old('answerforall.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('answerforall.body') }}</p>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>