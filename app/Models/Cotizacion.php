<?php

namespace App\Models;

use App\Enums\BoardEnum;
use App\Traits\DateFormatTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cotizacion extends Model
{
    use HasFactory, DateFormatTrait, SoftDeletes;

    protected $table = 'cotizacion';

    protected $appends = ['fecha'];

    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [
        'isAlivioFiscal' => 'boolean',
        'isTelematics' => 'boolean',
        'isSeguro' => 'boolean',
        'is24' => 'boolean',
        'is36' => 'boolean',
        'is48' => 'boolean',
        'is60' => 'boolean',
        'valorActivo' => 'double',
        'anticipo' => 'double',
        'anticipoPorcentaje' => 'double',
        'comisionPorApertura' => 'double',
        'comisionPorcentaje' => 'double',
        'interes' => 'double',
        'valorSeguro' => 'double',
        'valorResidual24' => 'double',
        'valorResidual36' => 'double',
        'valorResidual48' => 'double',
        'valorResidual60' => 'double',
        'board_id' => BoardEnum::class,
    ];

    protected $fillable = [
        'from_user_id',
        'to_user_id',
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
        'grupo'
    ];

    public function board() {
        return $this->hasOne(Board::class, 'id', 'board_id');
    }

    public function from_user() {
        return $this->hasOne(User::class, 'id', 'from_user_id');
    }

    public function to_user() {
        return $this->hasOne(User::class, 'id', 'to_user_id');
    }

    public function getFechaAttribute()
    {
        return $this->getFechaFormat($this->created_at);
    }

    public function scopeClienteBoard(Builder $builder, $clienteId, $boardId) {
        return $builder->where([
            ['from_user_id', $clienteId],
            ['board_id', $boardId]
        ]);
    }

    public function scopeUserBoard(Builder $builder, $userId, $boardId) {
        return $builder->where([
            ['to_user_id', $userId],
            ['board_id', $boardId]
        ]);
    }
}
