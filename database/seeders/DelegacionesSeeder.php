<?php

namespace Database\Seeders;

use App\Models\Delegacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DelegacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $path = database_path('seeders/data/delegaciones.csv');

        if (!file_exists($path)) {
            $this->command->warn('El archivo delegaciones.csv no fue encontrado.');
            return;
        }

        $delegaciones = array_map('str_getcsv', file($path));

        foreach ($delegaciones as $index => $row) {
            if ($index === 0) continue; // Omitir cabecera

            $row = array_map('trim', $row); // Elimina espacios invisibles

            Delegacion::updateOrCreate(
                ['id' => $row[0]],
                [
                    'region_id'        => $row[1],
                    'nivel_id'         => $row[2],
                    'tipo'             => $row[3],
                    'numero'           => $row[4],
                    'clave'            => $row[5],
                    'estatus'          => $row[6],
                    'nomenclatura_id'  => $row[7],
                    'sede'             => $row[8],
                    'direccion'        => $row[9],
                    'cp'               => $row[10],
                    'ciudad'           => $row[11],
                    'estado'           => $row[12],
                    'fecha_inicio' => !empty($row[13])
                        ? Carbon::createFromFormat('d/m/Y', $row[13])
                        : null,
                    'fecha_fin' => !empty($row[14])
                        ? Carbon::createFromFormat('d/m/Y', $row[14])
                        : null,                    
                ]
            );
        }

        $this->command->info('delegaciones importadas correctamente.');
    }    
}
