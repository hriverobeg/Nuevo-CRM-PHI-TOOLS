<?php

namespace Database\Seeders;

use App\Models\TipoArchivo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoArchivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoArchivo::create([
            'nombre' => 'Identificación de representante legal',
        ]);

        TipoArchivo::create([
            'nombre' => 'Comprobante de domicilio representante legal',
        ]);

        TipoArchivo::create([
            'nombre' => 'Comprobante de domicilio de la empresa',
        ]);

        TipoArchivo::create([
            'nombre' => 'Curriculum de la empresa',
        ]);

        TipoArchivo::create([
            'nombre' => 'Formato de autorización de buró de crédito representante legal',
        ]);

        TipoArchivo::create([
            'nombre' => 'Formato de autorización de buró de crédito de empresa',
        ]);

        TipoArchivo::create([
            'nombre' => 'Declaración ISR año en curso más reciente',
        ]);

        TipoArchivo::create([
            'nombre' => 'Acuse de recibo de declaración ISR año en curso más reciente',
        ]);

        TipoArchivo::create([
            'nombre' => 'Declaración anual ISR último año',
        ]);

        TipoArchivo::create([
            'nombre' => 'Acuse de recibo de declaración anual ISR último año',
        ]);

        TipoArchivo::create([
            'nombre' => 'Declaración anual ISR penúltimo año',
        ]);

        TipoArchivo::create([
            'nombre' => 'Acuse de recibo de declaración anual ISR penúltimo año',
        ]);

        TipoArchivo::create([
            'nombre' => 'Estados financieros y analíticas año en curso más reciente',
        ]);

        TipoArchivo::create([
            'nombre' => 'Estados financieros y analíticas último año',
        ]);

        TipoArchivo::create([
            'nombre' => 'Estados financieros y analíticas penúltimo año',
        ]);

        TipoArchivo::create([
            'nombre' => 'Estados de cuenta bancarios últimos 3 meses',
        ]);

        TipoArchivo::create([
            'nombre' => 'Constancia de situación fiscal',
        ]);

        TipoArchivo::create([
            'nombre' => 'Acta constitutiva y acta de asamblea',
        ]);

        TipoArchivo::create([
            'nombre' => 'Opinión de cumplimiento',
        ]);
    }
}
