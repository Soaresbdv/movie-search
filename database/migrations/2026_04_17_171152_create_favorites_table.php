<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();

            // Relaciona o filme salvo com o usuário que está logado
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // Dados que vêm da API do TMDB
            $table->unsignedBigInteger('tmdb_id');
            $table->string('title');
            $table->string('poster_path')->nullable(); // Caminho da imagem da capa

            // Dados que o usuário preenche na nossa plataforma
            $table->integer('personal_rating')->nullable(); // Nota de 1 a 5
            $table->text('review')->nullable(); // Resenha/Comentário

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
