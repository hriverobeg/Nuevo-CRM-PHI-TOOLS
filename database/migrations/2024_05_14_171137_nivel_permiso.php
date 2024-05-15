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
        Schema::create('nivel_permiso', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nivel_id')->constrained(
                table: 'nivel',
                indexName: 'nivel_permiso_nivel_id'
            )->onDelete('cascade');
            $table->foreignId('permiso_id')->constrained(
                table: 'permiso',
                indexName: 'nivel_permiso_permiso_id'
            )->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nivel_permiso');
    }
};
