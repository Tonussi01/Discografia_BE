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
        Schema::table('discos', function (Blueprint $table) {
            $table->string('imagem_url')->nullable()->after('descricao');
            // Adiciona a coluna 'imagem_url' depois da coluna 'descricao'.
            // O campo é opcional, por isso foi definido como 'nullable'.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('discos', function (Blueprint $table) {
            $table->dropColumn('imagem_url');
            // Remove a coluna 'imagem_url' ao reverter a migration.
        });
    }
};
