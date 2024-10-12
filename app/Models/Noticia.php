<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Noticia extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'subtitulo',
        'texto',
        'data_noticia',
        'imagem',
        'autor',
        'arquivo',
        'link_externo',
    ];

    protected $table = 'noticias';
}
