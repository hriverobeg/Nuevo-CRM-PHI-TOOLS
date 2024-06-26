<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Admin extends User
{
    protected $nivel_id = 1;

    protected static function booted()
    {
        static::addGlobalScope('nivel_id', function (Builder $builder) {
            $builder->where('nivel_id', 1);
        });
    }
}
