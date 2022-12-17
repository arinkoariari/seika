<x-app-layout>
    <x-slot name="header">
        　laravel
    </x-slot>
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
        <div class='questsall'>
            @foreach ($questsall as $questall)
                <div class='questsall'>
                    <h2 class='title'>
                        <a href="/posts/{{ $questall->id }}">{{ $questall->title }}</a>
                        </h2>
                    <p class='body'>{{ $questall->body }}</p>
                    <form action="/posts/{{ $questall->id }}" id="form_{{ $questall->id }}" method="post">
                        @csrf
                        
                    </form>
                </div>
                
            @endforeach
        </div>
         <div class='paginate'>
            {{  $questsall->links() }}
        </div>
    </body>
    
    
</html>
</x-app-layout>