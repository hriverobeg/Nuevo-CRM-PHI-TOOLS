<?php

namespace Database\Seeders;

use App\Models\Permiso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permiso::create([
            'nombre' => 'crear-cuenta-admin',
        ]);

        Permiso::create([
            'nombre' => 'crear-cuenta-v-interno',
        ]);

        Permiso::create([
            'nombre' => 'crear-cuenta-v-externo',
        ]);

        Permiso::create([
            'nombre' => 'crear-cuenta-cliente',
        ]);

        Permiso::create([
            'nombre' => 'eliminar-cuenta-admin',
        ]);

        Permiso::create([
            'nombre' => 'eliminar-cuenta-v-interno',
        ]);

        Permiso::create([
            'nombre' => 'eliminar-cuenta-v-externo',
        ]);

        Permiso::create([
            'nombre' => 'eliminar-cuenta-cliente',
        ]);

        Permiso::create([
            'nombre' => 'editar-cuenta-admin',
        ]);

        Permiso::create([
            'nombre' => 'editar-cuenta-v-interno',
        ]);

        Permiso::create([
            'nombre' => 'editar-cuenta-v-externo',
        ]);

        Permiso::create([
            'nombre' => 'editar-cuenta-todos-cliente',
        ]);

        Permiso::create([
            'nombre' => 'editar-cuenta-cliente-perteneciente',
        ]);

        Permiso::create([
            'nombre' => 'crear-cotizaciones',
        ]);

        Permiso::create([
            'nombre' => 'mover-cotizaciones',
        ]);

        Permiso::create([
            'nombre' => 'eliminar-todas-las-cotizaciones',
        ]);

        Permiso::create([
            'nombre' => 'eliminar-cotizaciones-propias',
        ]);

        Permiso::create([
            'nombre' => 'visualizar-todas-las-cotizaciones-del-sistema',
        ]);

        Permiso::create([
            'nombre' => 'visualizar-cotizaciones-propias',
        ]);

        Permiso::create([
            'nombre' => 'condiciones-financieras-abiertas',
        ]);

        Permiso::create([
            'nombre' => 'condiciones-financieras-delimitadas',
        ]);

        Permiso::create([
            'nombre' => 'cotizar-con-seguro',
        ]);

        Permiso::create([
            'nombre' => 'notificaciones-pendientes',
        ]);

        Permiso::create([
            'nombre' => 'visualizar-perfil-admins',
        ]);

        Permiso::create([
            'nombre' => 'visualizar-perfiles-todos-los-perfiles-v-internos',
        ]);

        Permiso::create([
            'nombre' => 'visualizar-perfiles-todos-los-perfiles-v-externos',
        ]);

        Permiso::create([
            'nombre' => 'visualizar-todos-los-perfiles-de-clientes',
        ]);

        Permiso::create([
            'nombre' => 'visualizar-todos-los-perfiles-de-clientes-propios',
        ]);

        Permiso::create([
            'nombre' => 'visualizar-su-propio-perfil',
        ]);

        Permiso::create([
            'nombre' => 'editar-informacion-general-de-v-internos',
        ]);

        Permiso::create([
            'nombre' => 'editar-informacion-general-de-v-externos',
        ]);

        Permiso::create([
            'nombre' => 'editar-informacion-general-de-cualquier-cliente',
        ]);

        Permiso::create([
            'nombre' => 'editar-informacion-general-de-sus-propios-clientes',
        ]);

        Permiso::create([
            'nombre' => 'eliminar-informacion-general',
        ]);

        Permiso::create([
            'nombre' => 'cargar-informacion-en-expediente-de-credito',
        ]);

        Permiso::create([
            'nombre' => 'eliminar-informacion-en-expediente-de-credito',
        ]);

        Permiso::create([
            'nombre' => 'tabla-de-todas-las-cotizaciones',
        ]);

        Permiso::create([
            'nombre' => 'tabla-de-cotizaciones-propias',
        ]);

        Permiso::create([
            'nombre' => 'tabla-de-v-internos',
        ]);

        Permiso::create([
            'nombre' => 'tabla-de-v-externos',
        ]);

        Permiso::create([
            'nombre' => 'tabla-de-todos-los-clientes',
        ]);

        Permiso::create([
            'nombre' => 'tabla-de-clientes-propios',
        ]);
    }
}
