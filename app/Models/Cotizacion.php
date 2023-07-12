<?php

namespace App\Models;

use App\Traits\DateFormatTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cotizacion extends Model
{
    use HasFactory, DateFormatTrait, SoftDeletes;

    protected $table = 'cotizacion';

    protected $appends = ['fecha'];

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = [
        'usuario_id',
        'admin_id',
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
}
