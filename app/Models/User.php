<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $table = 'user';

    protected $appends = ['isAdmin'];

    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'parent_user_id',
        'empresa',
        'direccion_empresa',
        'giro_empresa',
        'website_empresa',
        'password',
        'nivel_id',
        'telefono',
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
