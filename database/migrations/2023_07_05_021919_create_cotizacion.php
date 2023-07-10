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
        Schema::create('cotizacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained(
                table: 'cliente', indexName: 'cotizacion_cliente_id'
            );
            $table->string('nombreActivo');
            $table->string('anio', 4);
            $table->string('tituloCotizacion');
            $table->decimal('valorActivo');
            $table->decimal('anticipo');
            $table->decimal('anticipoPorcentaje', 3);
            $table->decimal('comisionPorApertura');
            $table->decimal('comisionPorcentaje', 3);
            $table->decimal('interes', 3);
            $table->decimal('valorSeguro');
            $table->string('tipoActivo', 25);
            $table->string('otro', 100);
            $table->decimal('valorResidual24', 3);
            $table->decimal('valorResidual36', 3);
            $table->decimal('valorResidual48', 3);
            $table->decimal('valorResidual60', 3);
            $table->decimal('valorResidual24Cantidad');
            $table->decimal('valorResidual36Cantidad');
            $table->decimal('valorResidual48Cantidad');
            $table->decimal('valorResidual60Cantidad');
            $table->boolean('isTelematics');
            $table->boolean('isSeguro');
            $table->boolean('is24');
            $table->boolean('is36');
            $table->boolean('is48');
            $table->boolean('is60');
            $table->boolean('isAlivioFiscal');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizacion');
    }
};
