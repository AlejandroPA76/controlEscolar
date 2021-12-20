<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Docente;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    /*$data = [
            ['name' => 'alex'],
            ['email' => 'alex@alex.com'],
            ['password' => '1234'],
    ];
    DB::table('users')->insert($data);*/
    $d= User::create([
            'name' => 'alex',
            'email' => 'alejandro@h.com',
            'password' => '1234',


        ]);

        $d= Docente::create([
            'matricula' => '1234',
            'nombre' => 'alejandro',
            'apellido_p' => 'pe',
            'apellido_m' => 'ave',
            'user_id' => 2,


        ]);

    
 }
    }

