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
            'periodo_escolar' => '2017-2021',

        ]);


           $g= CicloEscolar::create([
            'periodo_escolar' => '2018-2022',

        ]);

    }
}
