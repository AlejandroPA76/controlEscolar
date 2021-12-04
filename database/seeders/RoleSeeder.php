<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // declaroamos unnvaribale rol
        $roles=[
            'Admin',
            'Docente',
            'Tutor',
            'Contador',
        ];

        foreach($roles as $role){
            Role::create([
                'name'=>$role
            ]);
        }

    }
}
