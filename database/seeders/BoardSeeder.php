<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Board::create([
            'id' => 1,
            'nombre' => 'Propuesta enviada',
            'nivel_id' => 2
        ]);

        Board::create([
            'id' => 2,
            'nombre' => 'Propuesta aceptada',
            'nivel_id' => 2
        ]);

        Board::create([
            'id' => 3,
            'nombre' => 'Propuesta autorizada',
            'nivel_id' => 1
        ]);

        Board::create([
            'id' => 4,
            'nombre' => 'Propuesta ejecutada',
            'nivel_id' => 1
        ]);

        Board::create([
            'id' => 5,
            'nombre' => 'Propuesta rechazada',
            'nivel_id' => 1
        ]);
    }
}
