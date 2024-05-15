<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelPermiso extends Model
{
    use HasFactory;

    protected $table = 'nivel_permiso';

    protected $fillable = [
        'nivel_id',
        'permiso_id'
    ];
}
