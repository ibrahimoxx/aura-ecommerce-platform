<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { font-family: 'Inter', sans-serif; }
        </style>
    </head>
    <body class="antialiased text-[#222222] bg-[#ffffff] selection:bg-[#556B2F] selection:text-white">
        <!-- Minimal Header for Auth -->
        <div class="w-full flex justify-center py-8 border-b border-gray-100">
            <a href="{{ route('dashboard') }}" class="text-2xl font-serif tracking-widest text-black uppercase">
                AURA
            </a>
        </div>

        <div class="min-h-[calc(100vh-100px)] flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#f9f8f6]">
            <div class="w-full sm:max-w-md mt-6 px-10 py-12 bg-white overflow-hidden sm:rounded-[8px] border border-gray-100 shadow-sm">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
