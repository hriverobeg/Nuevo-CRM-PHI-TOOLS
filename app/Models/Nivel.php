<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    protected $table = 'nivel';

    protected $fillable = [
        'nombre'
    ];

    public function permisos() {
        return $this->belongsToMany(Permiso::class, 'nivel_permiso', 'nivel_id', 'permiso_id');
    }
}
