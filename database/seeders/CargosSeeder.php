<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('seeders/data/cargos.csv');

        if (!file_exists($path)) {
            $this->command->warn('El archivo cargos.csv no fue encontrado.');
            return;
        }

        $cargos = array_map('str_getcsv', file($path));

        foreach ($cargos as $index => $row) {
            if ($index === 0) continue; // Omitir cabecera

            Cargo::updateOrCreate(
                ['id' => $row[0]],
                [
                    'nombre' => $row[1],
                    'es_principal' => (bool) $row[2],
                ]
            );
        }

        $this->command->info('Cargos importados correctamente.');
    }
}
