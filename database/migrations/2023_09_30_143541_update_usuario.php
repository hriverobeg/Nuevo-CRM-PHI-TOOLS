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
        Schema::table('usuario', function (Blueprint $table) {
            $table->string('empresa')->nullable()->after('telefono');
            $table->string('direccion_empresa')->nullable()->after('empresa');
            $table->string('giro_empresa')->nullable()->after('direccion_empresa');
            $table->string('website_empresa')->nullable()->after('giro_empresa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuario', function (Blueprint $table) {
            //
        });
    }
};
