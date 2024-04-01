<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioArchivo extends Model
{
    use HasFactory;

    protected $table = 'user_archivo';

    protected $fillable = [
        'nombre',
        'user_id',
        'tipo_archivo_id'
    ];

    public function scopeArchivos(Builder $builder, $userId, $tipoArchivoId) {
        return $builder->where([
            ['user_id', $userId],
            ['tipo_archivo_id', $tipoArchivoId]
        ]);
    }
}
