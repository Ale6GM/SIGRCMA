<?php

namespace Database\Seeders;

use App\Models\Esestado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoLocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Esestado::create(['descripcion' => 'Sin Comunicacion']);
        Esestado::create(['descripcion' => 'Desconectado']);
        Esestado::create(['descripcion' => 'En Linea']);
    }
}
