<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'My Blog') }}</title> -->
    <title>My Blog</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <!-- {{ config('app.name', 'My Blog') }} -->
                    My Blog
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item border-bottom">
                            <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
                        </li>
                        <li class="nav-item border-bottom">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>    
                    </ul> 
                        <ul class="navbar-nav ml-auto">
                        <li class="nav-item" style="padding:1%;">
                            <a class="nav-link" style="padding:0;" href="https://t.me/noby_y" target="_blank">
                                <img src="/images/telegram.svg" class="contacts-icon" alt="Telegram"></a>
                        </li>
                        <li class="nav-item" style="padding:1%;">
                            <a class="nav-link" style="padding:0;" href="https://github.com/noby-y" target="_blank">
                                <img src="/images/github.svg" class="contacts-icon" alt="GitHub"></a>
                        </li>
                        <li class="nav-item" style="padding:1%; padding-top:3%;">
                            <a class="nav-link" style="padding:0;" href="https://discordapp.com/users/368481685374894083" target="_blank">
                                <img src="/images/discord.svg" class="contacts-icon" alt="Discord"></a>
                        </li>
                        <li class="nav-item" style="padding:1%;">
                            <a class="nav-link" style="padding:0;" href="mailto:noby.official@gmail.com" target="_blank">
                                <img src="/images/gmail.svg" class="contacts-icon" alt="Gmail"></a>
                        </li>
                        <li class="nav-item" style="padding:1%;">
                            <a class="nav-link" style="padding:0;" href="https://www.linkedin.com/in/tigran-avanesov-88b700270/" target="_blank">
                                <img src="/images/linkedin.svg" class="contacts-icon" alt="Linkedin"></a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.categories.index') }}">
                                    Categories
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.tags.index') }}">
                                    Tags
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.posts.index') }}">
                                    Posts
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>