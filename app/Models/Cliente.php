<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Cliente extends User
{
    protected $nivel_id = 3;

    protected static function booted()
    {
        static::addGlobalScope('nivel_id', function (Builder $builder) {
            $builder->where('nivel_id', 3);
        });
    }
}
