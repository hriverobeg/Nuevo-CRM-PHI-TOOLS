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
        Schema::create('usuario_archivo', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('usuario_id')->constrained(
                table: 'usuario',
                indexName: 'usuario_archivo_usuario_id'
            );
            $table->foreignId('tipo_archivo_id')->constrained(
                table: 'tipo_archivo',
                indexName: 'usuario_archivo_tipo_archivo_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_archivo');
    }
};
