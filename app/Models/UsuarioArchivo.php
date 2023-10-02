<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioArchivo extends Model
{
    use HasFactory;

    protected $table = 'usuario_archivo';

    protected $fillable = [
        'nombre',
        'usuario_id',
        'tipo_archivo_id'
    ];

    public function scopeArchivos(Builder $builder, $usuarioId, $tipoArchivoId) {
        return $builder->where([
            ['usuario_id', $usuarioId],
            ['tipo_archivo_id', $tipoArchivoId]
        ]);
    }
}
