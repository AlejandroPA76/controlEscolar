<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grupo;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $g= Grupo::create([
            'cupo_maximo' => 15,
            'grado' => 1,
            'grupo_nombre' => 'A',

        ]);

         $g= Grupo::create([
            'cupo_maximo' => 15,
            'grado' => 2,
            'grupo_nombre' => 'B',

        ]);

         $g= Grupo::create([
            'cupo_maximo' => 15,
            'grado' => 3,
            'grupo_nombre' => 'C',

        ]);


    }
}
