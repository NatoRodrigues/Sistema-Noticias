<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index(Request $request)
    {
        $totalNoticias = Noticia::count();


        $noticias = $request->input('search') ? Noticia::where('titulo', 'LIKE', '%' . $request->input('search') . '%')->get() : Noticia::all();

        if ($request->ajax()) {
            return response()->json(['noticias' => $noticias]);
        }

        return view('dashboard', compact('totalNoticias', 'noticias'));
    }




    public function create()
    {
        return view('noticias.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'titulo' => 'required|max:255',
            'texto' => 'required',
            'data_noticia' => 'required|date',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'arquivo' => 'nullable|file|mimes:pdf,doc,docx,zip|max:10240',
        ]);


        $imagem = null;
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem')->store('imagens', 'public');
        }


        $arquivo = null;
        if ($request->hasFile('arquivo')) {
            $arquivo = $request->file('arquivo')->store('arquivos', 'public');
        }


        Noticia::create([
            'titulo' => $request->titulo,
            'subtitulo' => $request->subtitulo,
            'texto' => $request->texto,
            'data_noticia' => $request->data_noticia,
            'imagem' => $imagem,
            'legenda_imagem' => $request->legenda_imagem,
            'autor' => $request->autor,
            'arquivo' => $arquivo,
            'link_externo' => $request->link_externo,
        ]);

        return redirect()->route('noticias.index')->with('success', 'Notícia criada com sucesso!');
    }





    public function edit($id)
    {
        $noticia = Noticia::findOrFail($id);
        return view('noticias.edit', compact('noticia'));
    }




    public function update(Request $request, $id)
    {
        $noticia = Noticia::findOrFail($id);

        $request->validate([
            'data_noticia' => 'required|date',
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'nullable|string|max:255',
            'texto' => 'required|string',
            'legenda_imagem' => 'nullable|string|max:255',
            'autor' => 'nullable|string|max:255',
            'link_externo' => 'nullable|url',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Exemplo de validação
            'arquivo' => 'nullable|file|mimes:pdf', // Exemplo de validação
        ]);

        $noticia->data_noticia = $request->input('data_noticia');
        $noticia->titulo = $request->input('titulo');
        $noticia->subtitulo = $request->input('subtitulo');
        $noticia->texto = $request->input('texto');
        $noticia->legenda_imagem = $request->input('legenda_imagem');
        $noticia->autor = $request->input('autor');
        $noticia->link_externo = $request->input('link_externo');

        // Lógica para salvar a imagem e arquivo se forem enviados
        if ($request->hasFile('imagem')) {
            // Lógica para salvar a imagem
        }

        if ($request->hasFile('arquivo')) {
            // Lógica para salvar o arquivo
        }

        $noticia->save();

        return redirect()->route('noticias.index')->with('success', 'Notícia atualizada com sucesso!');
    }





    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();

        return redirect()->route('noticias.index')->with('success', 'Notícia excluída com sucesso!');
    }




    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $noticias = Noticia::where('titulo', 'LIKE', "%{$searchTerm}%")
            ->orWhere('texto', 'LIKE', "%{$searchTerm}%")
            ->paginate(10);

        return view('noticias.index', compact('noticias'));
    }
}
