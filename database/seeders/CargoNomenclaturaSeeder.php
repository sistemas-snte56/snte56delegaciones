<?php

namespace Database\Seeders;

use App\Models\Nomenclatura;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CargoNomenclaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $d1 = Nomenclatura::where('codigo', 'D-I-')->first();
        $d2 = Nomenclatura::where('codigo', 'D-II-')->first();
        $d3 = Nomenclatura::where('codigo', 'D-III-')->first();
        $d4 = Nomenclatura::where('codigo', 'D-IV-')->first();
        $ct = Nomenclatura::where('codigo', 'C.T.')->first();

        // D-I, D-II, D-III
        $cargosBase = [1,2,3,4,5,6,7];

        foreach ([$d1, $d2, $d3] as $nom) {
            $nom->cargos()->syncWithoutDetaching($cargosBase);
        }

        // D-IV
        $d4->cargos()->syncWithoutDetaching([1,2,4,5,7,8,9]);

        // C.T.
        $ct->cargos()->syncWithoutDetaching([10]);
    }
}
