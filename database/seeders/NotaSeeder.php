<?php

namespace Database\Seeders;

use App\Models\Nota;
use Illuminate\Database\Seeder;

class NotaSeeder extends Seeder
{
    public function run(): void
    {
        Nota::factory()->count(20)->create();

        Nota::create([
            'titulo' => 'Preparar práctica de Laravel',
            'contenido' => 'Revisar migraciones, modelo, controlador resource, rutas, vistas Blade y validación.',
            'categoria' => 'Estudio',
            'fijada' => true,
        ]);
    }
}
