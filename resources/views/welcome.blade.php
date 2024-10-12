<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Gerenciamento de Notícias</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased bg-white dark:bg-gray-900">
    <div class="min-h-screen flex flex-col">
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                    Sistema de Gerenciamento de Notícias
                </h1>
                @if (Route::has('login'))
                    <nav>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-300 underline">Painel</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-300 underline">Entrar</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Registrar</a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </header>

        <main class="flex-grow">
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <p class="text-gray-600 dark:text-gray-400">Aqui você poderá:</p>
                <div class="px-4 py-6 sm:px-0">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Visualizar suas Últimas Notícias</h2>
                                <p class="text-gray-600 dark:text-gray-400">Acesse e gerencie as notícias mais recentes do seu site.</p>
                                <a href="{{ route('login') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                    Últimas Notícias
                                </a>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Criar uma Nova Notícia</h2>
                                <p class="text-gray-600 dark:text-gray-400">Adicione novas notícias ao seu sistema de gerenciamento.</p>
                                <a href="{{ route('login') }}" class="mt-4 inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                    Criar Notícia
                                </a>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Gerenciar por Categorias</h2>
                                <p class="text-gray-600 dark:text-gray-400">Gerencie as categorias das suas notícias para melhor organização.</p>
                                <a href="{{ route('login') }}" class="mt-4 inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                                    Gerenciar Categorias
                                </a>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Analisar Estatísticas</h2>
                                <p class="text-gray-600 dark:text-gray-400">Visualize estatísticas e métricas sobre suas notícias e leitores.</p>
                                <a href="{{ route('login') }}" class="mt-4 inline-block bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded">
                                    Ver Estatísticas
                                </a>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Configurações</h2>
                                <p class="text-gray-600 dark:text-gray-400">Ajuste as configurações do seu sistema de gerenciamento de notícias.</p>
                                <a href="{{ route('login') }}" class="mt-4 inline-block bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                                    Configurar
                                </a>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Ter acesso a Suporte</h2>
                                <p class="text-gray-600 dark:text-gray-400">Precisa de ajuda? Entre em contato com nossa equipe de suporte.</p>
                                <a href="{{ route('login') }}" class="mt-4 inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                    Contatar Suporte
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                    &copy; {{ date('Y') }} Sistema de Gerenciamento de Notícias. Todos os direitos reservados.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>
