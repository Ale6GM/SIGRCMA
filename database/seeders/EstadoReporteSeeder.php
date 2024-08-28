<?php

namespace Database\Seeders;

use App\Models\Repestado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoReporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Repestado::create(['descripcion' => 'Pendiente']);
        Repestado::create(['descripcion' => 'Resuelto']);
    }
}
