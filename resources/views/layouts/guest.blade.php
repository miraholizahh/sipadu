<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-white dark:bg-gray-900">

    <div class="w-full border-t border-gray-300 shadow-sm"></div>

    <div class="min-h-screen flex flex-col items-center">
        <div class="mt-10 mb-4">
            <a href="#" class="flex items-center text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="h-12 mr-2" src="{{ asset('images/logo-uptd.png') }}" alt="Logo Puskesmas SIPADU-DBD">
                SIPADU-DBD
            </a>
        </div>

        <div class="w-full sm:max-w-md px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg mb-10">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
