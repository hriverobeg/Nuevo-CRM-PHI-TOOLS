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
            $table->foreignId('usuario_id')->nullable()->constrained(
                table: 'usuario',
                indexName: 'cotizacion_usuario_id'
            );
            $table->foreignId('cliente_id')->nullable()->constrained(
                table: 'admin',
                indexName: 'cotizacion_cliente_id'
            );
            $table->foreignId('admin_id')->constrained(
                table: 'admin',
                indexName: 'cotizacion_admin_id'
            );
            $table->foreignId('board_id')->constrained(
                table: 'board',
                indexName: 'cotizacion_board_id'
            );
            $table->string('nombreActivo');
            $table->string('anio', 4);
            $table->string('tituloCotizacion');
            $table->double('valorActivo');
            $table->double('anticipo');
            $table->double('anticipoPorcentaje');
            $table->double('comisionPorApertura');
            $table->double('comisionPorcentaje');
            $table->double('interes');
            $table->double('valorSeguro');
            $table->string('tipoActivo', 25);
            $table->string('otro', 100)->nullable();
            $table->double('valorResidual24');
            $table->double('valorResidual36');
            $table->double('valorResidual48');
            $table->double('valorResidual60');
            $table->double('valorResidual24Cantidad')->nullable();
            $table->double('valorResidual36Cantidad')->nullable();
            $table->double('valorResidual48Cantidad')->nullable();
            $table->double('valorResidual60Cantidad')->nullable();
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
