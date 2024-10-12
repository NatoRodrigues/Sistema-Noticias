<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Sistema de Gerenciamento de Notícias') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8 bg-gray-100">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Sistema de Gerenciamento de Notícias</h1>
            </div>

            <div class="w-full max-w-md space-y-8 bg-white p-8 shadow-lg rounded-lg">
                {{ $slot }}
            </div>

            <footer class="mt-8 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} Sistema de Gerenciamento de Notícias. Todos os direitos reservados.
            </footer>
        </div>
    </body>
</html>