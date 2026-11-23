<?php

namespace Database\Seeders;

use App\Models\Equipo;
use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    public function run(): void
    {
        $faltantes = max(0, 10 - Equipo::query()->count());

        Equipo::factory($faltantes)->create();
    }
}
