<?php

namespace Database\Seeders;

use App\Models\PlataformaPago;
use Illuminate\Database\Seeder;

class PlataformaPagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlataformaPago::create([
            'name' => 'MercadoPago',
            'image' => '',
        ]);
    }
}
