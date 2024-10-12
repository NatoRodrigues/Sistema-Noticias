@php
    use Illuminate\Support\Str;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel de Controle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                <h3 class="text-xl font-semibold">Estatísticas</h3>
                <p class="mt-2">Total de Notícias: <strong>{{ $totalNoticias }}</strong></p>
            </div>

            <!-- Grid de Notícias -->
            <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Notícias Cadastradas</h3>

                    <!-- Botão para adicionar nova notícia -->
                    <a href="{{ route('noticias.create') }}"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        + Nova Notícia
                    </a>
                </div>

                <!-- Barra de Pesquisa -->
                <div class="flex mb-4">
                    <input type="text" id="searchInput" name="search" placeholder="Pesquisar notícias..."
                        class="w-full p-2 border border-gray-300 rounded-lg">
                    <button type="button" id="searchButton"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2 inline-flex items-center">
                        <i class="fas fa-search mr-2"></i> <!-- Ícone de lupa -->
                        Pesquisar
                    </button>

                </div>

                <div class="overflow-x-auto">
                    <table id="noticiasTable" class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr class="w-full bg-gray-100 text-left">
                                <th class="p-4 border">Título</th>
                                <th class="p-4 border">Autor</th>
                                <th class="p-4 border">Texto</th>
                                <th class="p-4 border">Data</th>
                                <th class="p-4 border">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($noticias as $noticia)
                                <tr>
                                    <td class="p-4 border">{{ $noticia->titulo }}</td>
                                    <td class="p-4 border">{{ $noticia->autor }}</td>
                                    <td class="p-4 border">{{ Str::limit($noticia->texto, 50) }}</td>
                                    <td class="p-4 border">
                                        {{ \Carbon\Carbon::parse($noticia->data_noticia)->format('d/m/Y') }}</td>
                                    <td class="p-4 border">
                                        <div class="flex space-x-4">
                                            <div class="flex space-x-2">
                                                <!-- Botão de Editar -->
                                                <a href="{{ route('noticias.edit', $noticia->id) }}"
                                                    class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-4 rounded inline-flex items-center">
                                                    <i class="fas fa-edit mr-2"></i> <!-- Ícone de edição -->
                                                    Editar
                                                </a>

                                                <!-- Botão de Excluir -->
                                                <form action="{{ route('noticias.destroy', $noticia->id) }}"
                                                    method="POST" class="inline-block"
                                                    onsubmit="return confirm('Tem certeza que deseja excluir?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-700 text-white py-1 px-4 rounded inline-flex items-center">
                                                        <i class="fas fa-trash mr-2"></i> <!-- Ícone de lixeira -->
                                                        Excluir
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchButton').on('click', function() {
                var query = $('#searchInput').val();

                $.ajax({
                    url: "{{ route('noticias.index') }}",
                    method: "GET",
                    data: {
                        search: query
                    },
                    success: function(response) {
                        // Limpa a tabela atual e insere os resultados
                        $('#noticiasTable tbody').empty();

                        response.noticias.forEach(function(noticia) {
                            var row = `
                                <tr>
                                    <td class="p-4 border">${noticia.titulo}</td>
                                    <td class="p-4 border">${noticia.autor}</td>
                                    <td class="p-4 border">${noticia.texto.substring(0, 50)}...</td>
                                    <td class="p-4 border">${new Date(noticia.data_noticia).toLocaleDateString()}</td>
                                    <td class="p-4 border">
                                         <div class="flex space-x-4">
                                            <div class="flex space-x-2">
                                                <!-- Botão de Editar -->
                                                <a href="{{ route('noticias.edit', $noticia->id) }}"
                                                    class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-4 rounded inline-flex items-center">
                                                    <i class="fas fa-edit mr-2"></i> <!-- Ícone de edição -->
                                                    Editar
                                                </a>

                                                <!-- Botão de Excluir -->
                                                <form action="{{ route('noticias.destroy', $noticia->id) }}"
                                                    method="POST" class="inline-block"
                                                    onsubmit="return confirm('Tem certeza que deseja excluir?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-700 text-white py-1 px-4 rounded inline-flex items-center">
                                                        <i class="fas fa-trash mr-2"></i> <!-- Ícone de lixeira -->
                                                        Excluir
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                            `;

                            $('#noticiasTable tbody').append(row);
                        });
                    },
                    error: function(xhr) {
                        // Tratar erro
                        console.error('Erro na pesquisa: ', xhr);
                    }
                });
            });
        });
    </script>
</x-app-layout>
