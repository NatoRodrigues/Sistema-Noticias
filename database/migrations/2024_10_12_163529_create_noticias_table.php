<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->date('data_noticia');
            $table->string('titulo');
            $table->string('subtitulo')->nullable();
            $table->text('texto');
            $table->string('imagem')->nullable();
            $table->string('legenda_imagem')->nullable();
            $table->string('autor')->nullable();
            $table->string('arquivo')->nullable();
            $table->string('link_externo')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
