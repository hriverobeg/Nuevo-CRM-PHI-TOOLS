<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = 'cotizacion';

    protected $appends = ['fecha'];

    protected $fillable = [
        'usuario_id',
        'cliente_id',
        'board_id',
        'nombreActivo',
        'anio',
        'tituloCotizacion',
        'valorActivo',
        'anticipo',
        'anticipoPorcentaje',
        'comisionPorApertura',
        'comisionPorcentaje',
        'interes',
        'valorSeguro',
        'tipoActivo',
        'otro',
        'valorResidual24',
        'valorResidual36',
        'valorResidual48',
        'valorResidual60',
        'valorResidual24Cantidad',
        'valorResidual36Cantidad',
        'valorResidual48Cantidad',
        'valorResidual60Cantidad',
        'isTelematics',
        'isSeguro',
        'is24',
        'is36',
        'is48',
        'is60',
        'isAlivioFiscal',
    ];

    public function getFechaAttribute()
    {
        $meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
        $fecha = \Carbon\Carbon::parse($this->created_at);
        $mes = $meses[($fecha->format('n')) - 1];
        return $fecha->format('d') . ' de ' . $mes . ' del ' . $fecha->format('Y');
    }
}
