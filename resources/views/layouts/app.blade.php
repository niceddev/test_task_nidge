<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0">
    <title>@yield('title', 'User Ranking System')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    @vite('resources/js/notification.js')
</head>
<body>

    @yield('content')

</body>
</html>
