<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'usuario';

    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'admin_id',
        'empresa',
        'direccion_empresa',
        'giro_empresa',
        'website_empresa'
    ];
}
