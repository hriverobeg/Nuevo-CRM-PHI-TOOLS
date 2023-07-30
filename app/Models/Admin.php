<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $table = 'admin';

    protected $appends = ['isAdmin'];

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'nivel_id',
        'empresa',
        'telefono',
        'empresa',
        'interes',
        'comisionPorcentaje'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function getIsAdminAttribute() {
        return $this->nivel_id == 1;
    }

    public function scopeAdmin(Builder $query) {
        return $query->where('nivel_id', 1);
    }

    public function scopeCliente(Builder $query) {
        return $query->where('nivel_id', 2);
    }
}
