<?php

namespace Database\Seeders;

use App\Models\Nomenclatura;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NomenclaturasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('seeders/data/nomenclaturas.csv');

        if (!file_exists($path)) {
            $this->command->warn('El archivo nomenclaturas.csv no fue encontrado.');
            return;
        }

        $nomenclaturas = array_map('str_getcsv', file($path));

        foreach ($nomenclaturas as $index => $row) {
            if ($index === 0) continue; // Omitir cabecera

            Nomenclatura::updateOrCreate(
                ['id' => $row[0]],
                [
                    'codigo' => $row[1],
                    'descripcion' => $row[2],
                    'tipo' => $row[3],
                ]
            );
        }

        $this->command->info('Nomenclaturas importadas correctamente.');
    }
}
