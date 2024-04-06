<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Our goal is help the Laravel community to find the best solution for the errors they encounter.">
    <meta name="author" content="Laravel Errors">
    <meta name="google" content="notranslate">
    <meta name="robots" content="index, follow">
    <meta name="applicable-device" content="pc, mobile">
    <meta name="canonical" content="{{ url()->current() }}">
    <meta name="keywords" content="laravel, errors, livewire, spatie, filament, nova, error">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.bunny.net/css?family=Jetbrains+Mono:500&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-amber-50 font-sans antialiased">
@include('components.layouts.navigation')

{{ $slot }}

@include('components.footer')

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-PY2CYFKS0Z"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-PY2CYFKS0Z');
</script>
</body>
</html>
