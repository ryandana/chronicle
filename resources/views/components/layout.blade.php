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

<body x-data="{ open: false }">
    <x-header></x-header>

    <section class="min-h-dvh mx-auto max-w-7xl px-6">
        <x-breadcrumbs />
        {{ $slot }}
    </section>
    <x-footer></x-footer>
    @livewireScripts()
</body>

</html>
