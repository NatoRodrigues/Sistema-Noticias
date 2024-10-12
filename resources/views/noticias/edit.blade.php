<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Notícia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Formulário de edição de notícia -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-6">Atualizar Notícia</h3>

                <form method="POST" action="{{ route('noticias.update', $noticia->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Data da Notícia -->
                    <div class="mb-4">
                        <x-input-label for="data_noticia" :value="__('Data da Notícia')" />
                        <x-text-input id="data_noticia" class="block mt-1 w-full" type="date" name="data_noticia"
                            :value="old('data_noticia', $noticia->data_noticia)" required />
                        <x-input-error :messages="$errors->get('data_noticia')" class="mt-2" />
                    </div>

                    <!-- Título -->
                    <div class="mb-4">
                        <x-input-label for="titulo" :value="__('Título')" />
                        <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo"
                            :value="old('titulo', $noticia->titulo)" required />
                        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
                    </div>

                    <!-- Subtítulo -->
                    <div class="mb-4">
                        <x-input-label for="subtitulo" :value="__('Subtítulo')" />
                        <x-text-input id="subtitulo" class="block mt-1 w-full" type="text" name="subtitulo"
                            :value="old('subtitulo', $noticia->subtitulo)" />
                        <x-input-error :messages="$errors->get('subtitulo')" class="mt-2" />
                    </div>

                    <!-- Texto -->
                    <div class="mb-4">
                        <x-input-label for="texto" :value="__('Texto')" />
                        <textarea id="texto" class="block mt-1 w-full border-gray-300 rounded-md" name="texto" rows="6" required>{{ old('texto', $noticia->texto) }}</textarea>
                        <x-input-error :messages="$errors->get('texto')" class="mt-2" />
                    </div>

                    <!-- Imagem -->
                    <div class="mb-4">
                        <x-input-label for="imagem" :value="__('Imagem')" />

                        <!-- Exibir a imagem atual se existir -->
                        @if ($noticia->imagem)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $noticia->imagem) }}" alt="Imagem da Notícia"
                                    class="w-24 h-24 object-cover" /> <!-- Tamanho menor -->
                            </div>
                        @else
                            <!-- Imagem padrão se não houver uma imagem da notícia -->
                            <div class="mb-2">
                                <img src="{{ asset('caminho/para/imagem/padrao.jpg') }}" alt="Imagem Padrão"
                                    class="w-24 h-24 object-cover" /> <!-- Tamanho menor -->
                            </div>
                        @endif

                        <!-- Campo de upload de nova imagem -->
                        <input id="imagem" class="block mt-1 w-full" type="file" name="imagem" />
                        <x-input-error :messages="$errors->get('imagem')" class="mt-2" />
                    </div>

                    <!-- Legenda da Imagem -->
                    <div class="mb-4">
                        <x-input-label for="legenda_imagem" :value="__('Legenda da Imagem')" />
                        <x-text-input id="legenda_imagem" class="block mt-1 w-full" type="text" name="legenda_imagem"
                            :value="old('legenda_imagem', $noticia->legenda_imagem)" />
                        <x-input-error :messages="$errors->get('legenda_imagem')" class="mt-2" />
                    </div>

                    <!-- Autor -->
                    <div class="mb-4">
                        <x-input-label for="autor" :value="__('Autor')" />
                        <x-text-input id="autor" class="block mt-1 w-full" type="text" name="autor"
                            :value="old('autor', $noticia->autor)" />
                        <x-input-error :messages="$errors->get('autor')" class="mt-2" />
                    </div>

                    <!-- Arquivo -->
                    <div class="mb-4">
                        <x-input-label for="arquivo" :value="__('Arquivo (PDF ou outro)')" />
                        <input id="arquivo" class="block mt-1 w-full" type="file" name="arquivo" />
                        <x-input-error :messages="$errors->get('arquivo')" class="mt-2" />
                    </div>

                    <!-- Link Externo -->
                    <div class="mb-4">
                        <x-input-label for="link_externo" :value="__('Link Externo')" />
                        <x-text-input id="link_externo" class="block mt-1 w-full" type="url" name="link_externo"
                            :value="old('link_externo', $noticia->link_externo)" />
                        <x-input-error :messages="$errors->get('link_externo')" class="mt-2" />
                    </div>


                    <div>
                        <x-primary-button>
                            {{ __('Editar Notícia') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
