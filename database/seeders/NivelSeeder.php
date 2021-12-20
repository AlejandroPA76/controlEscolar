<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nivel;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $n = Nivel::create([
            'nivel' => 'maternidad',
        ]);


         $n = Nivel::create([
            'nivel' => 'preescolar',
        ]);

         $n = Nivel::create([
            'nivel' => 'primaria',
        ]);

    }
}
