<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>r/place</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/img.png')}}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="p-0 m-0 flex justify-evenly bg-orange-500">
<img src="{{asset('img/img.png')}}" alt="r-place-logo" class="h-36 w-36 my-auto">
<x-canvas.canvas></x-canvas.canvas>
<img src="{{asset('img/img.png')}}" alt="r-place-logo" class="h-36 w-36 my-auto">
@livewireScripts
</body>
</html>
