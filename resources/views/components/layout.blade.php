<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width='device-width', initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @livewireStyles()
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('components.navbar', ['categories' => \App\Models\Post::all()])
    
    <section class="min-h-dvh mx-auto max-w-7xl px-6">
        {{ $slot }}
    </section>
    @livewireScripts()
</body>

</html>
