<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <header>
        Header:
        <ul>
            <li><a href="{{ action('ToursController@index') }}">Tours</a></li>
            <li><a href="{{ action('ToursController@index') }}">Guides</a></li>
            <li><a href="{{ action('BlogController@index') }}">Blog</a></li>
            <li><a href="{{ action('PageController@about') }}">About</a></li>
            <li><a href="{{ action('PageController@contact') }}">Contact</a></li>
        </ul>
        @yield('header')
    </header>
    <article>
        Content:
        @yield('content')
    </article>
    <footer>
        Footer:
        @yield('footer')
    </footer>
</body>
</html>