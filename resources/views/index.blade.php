<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Restaurant</title>

    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:ital,wght@0,400..700;1,400..700&family=Marcellus+SC&display=swap"
        rel="stylesheet">

    @vite('resources/js/app.js')
</head>

<body>
    <div class="logo__block" style="text-align: center">
        <h1 class="logo__name">Deluxe Restaurant</h1>
    </div>

    <div class="background__block" style='
        background-image:
            linear-gradient(to bottom, black 1%, transparent 10%),
            linear-gradient(to top, black 1%, transparent 12%),
            linear-gradient(to left, black 1%, transparent 9%),
            url("{{ asset('images/background.jpg') }}");
            '>
    </div>

    <div class="start__block">
        <button class="start__button">Make an order</button>
    </div>
</body>
