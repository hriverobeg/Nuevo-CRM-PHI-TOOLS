<?php

namespace App\Models;

use App\Traits\DateFormatTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notificacion extends Model
{
    use HasFactory, DateFormatTrait, SoftDeletes;

    protected $table = 'notificacion';

    protected $fillable = [
        'mensaje',
        'user_id',
        'leido_at',
        'titulo'
    ];

    protected $dates = ['created_at', 'updated_at', 'leido_at'];

    public function getFechaAttribute()
    {
        return $this->getFechaHoraFormat($this->created_at);
    }
}
