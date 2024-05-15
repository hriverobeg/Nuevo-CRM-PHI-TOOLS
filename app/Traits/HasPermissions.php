<?php

namespace App\Traits;

use App\Schemas\PermisoSchema;

trait HasPermissions
{
    public function hasPermission(string $permission): bool
    {
        return $this->nivel->permisos->contains(PermisoSchema::nombre, $permission);
    }
}
