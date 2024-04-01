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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nivel_id')->constrained(
                table: 'nivel',
                indexName: 'user_nivel_id'
            );
            $table->foreignId('parent_user_id')->nullable()->constrained(
                table: 'user',
                indexName: 'panret_user_id'
            );
            $table->string('nombre');
            $table->string('email');
            $table->string('password')->nullable();
            $table->string('telefono')->nullable();
            $table->double('interes')->default(27);
            $table->double('comisionPorcentaje')->default(2.5);
            $table->string('empresa')->nullable();
            $table->string('direccion_empresa')->nullable();
            $table->string('giro_empresa')->nullable();
            $table->string('website_empresa')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
