<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CicloEscolar;

class CicloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $g= CicloEscolar::create([
            'ciclo' => '2017-2021',

        ]);


           $g= CicloEscolar::create([
            'ciclo' => '2018-2022',

        ]);

    }
}
