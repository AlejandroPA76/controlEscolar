<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User ::create([
            'name' => 'superAdmin',
            'email' => 'super@admin.com',
            // 'username' => 'admin',
            'password' => bcrypt('1234'),
        ]);
        $user->assignRole('SuperAdmin');

        $user = User ::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            // 'username' => 'admin',
            'password' => bcrypt('1234'),
        ]);
        $user->assignRole('Admin');
        
        $user = User ::create([
            'name' => 'tutor',
            'email' => 'tutor@tutor.com',
            // 'username' => 'admin',
            'password' => bcrypt('1234'),
        ]);
        $user->assignRole('Tutor');
        
        $user = User ::create([
            'name' => 'Docente',
            'email' => 'docente@docente.com',
            // 'username' => 'admin',
            'password' => bcrypt('1234'),
        ]);
        $user->assignRole('Docente');


    }
}
