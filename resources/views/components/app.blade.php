<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    {{-- Menu --}}
<x-menu/>
    {{-- content  --}}
    <main id="app">
        <div class="container mt-4">
            <x-alerts/>
        </div>
        {{$slot}}
    </main>
</body>
</html>
