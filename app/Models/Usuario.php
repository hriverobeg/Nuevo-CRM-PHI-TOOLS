<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Usuario extends User
{
    protected $nivel_id = 2;

    protected static function booted()
    {
        static::addGlobalScope('nivel_id', function (Builder $builder) {
            $builder->where('nivel_id', 2);
        });
    }
}
