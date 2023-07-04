<?php

namespace Database\Seeders;

use App\Models\Nivel;
use Illuminate\Database\Seeder;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nivel::create([
            'id' => 1,
            'nombre' => 'Admin'
        ]);

        Nivel::create([
            'id' => 2,
            'nombre' => 'Cliente'
        ]);
    }
}
