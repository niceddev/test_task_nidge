<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0">
    <title>@yield('title', 'User Ranking System')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    @vite('resources/js/notification.js')
</head>
<body>
    <a href="/" class="absolute">
        {{ __('Главная') }}
    </a>

    @yield('content')

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>
</html>
