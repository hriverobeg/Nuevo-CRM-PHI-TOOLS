<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'nombre' => 'Administrador',
            'email' => 'admin@phitools.com',
            'password' => Hash::make("administrador"),
            'nivel_id' => 1
        ]);
    }
}
