<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('telefones', function (Blueprint $table) {
            $table->foreignId('contato_id')->constrained('contatos');
            $table->foreignId('tipo_id')->constrained('tipos');
        });

        Schema::table('contatos', function (Blueprint $table) {
            $table->foreignId('endereco_id')->constrained('enderecos');
        });

        Schema::create('contatos_has_categorias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contato_id')->constrained('contatos');
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contatos_has_categorias');  //
    }
};
