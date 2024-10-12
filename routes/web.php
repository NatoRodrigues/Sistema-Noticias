<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [NoticiaController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index'); // Listar notícias
    Route::get('/noticias/create', [NoticiaController::class, 'create'])->name('noticias.create'); // Formulário de criação
    Route::post('/noticias', [NoticiaController::class, 'store'])->name('noticias.store'); // Salvar nova notícia
    Route::get('/noticias/{id}/edit', [NoticiaController::class, 'edit'])->name('noticias.edit'); // Formulário de edição
    Route::put('/noticias/{id}', [NoticiaController::class, 'update'])->name('noticias.update'); // Atualizar notícia
    Route::delete('/noticias/{id}', [NoticiaController::class, 'destroy'])->name('noticias.destroy'); // Excluir notícia
    Route::get('/noticias/search', [NoticiaController::class, 'search'])->name('noticias.search'); // Pesquisa
});
require __DIR__.'/auth.php';
