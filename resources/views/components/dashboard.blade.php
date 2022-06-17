<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}"></script>
    <title>Budge App</title>
</head>
<body>
    <x-nav></x-nav>
    <div class="flex gap-3 p-4 max-w-7xl mt-8 mx-auto">
        <div class="w-3/4">{{ $slot }}</div>
        @if (isset($sidebar))
            <div class="w-1/4">{{ $sidebar }}</div>
        @endif
    </div>
</body>
</html>
