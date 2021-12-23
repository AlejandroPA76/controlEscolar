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
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('SuperAdmin');
        
        $user = User ::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            // 'username' => 'admin',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('Admin');
        
        $user = User ::create([
            'name' => 'tutor',
            'email' => 'tutor@tutor.com',
            // 'username' => 'admin',
            'password' => bcrypt('tutor'),
        ]);

        $user->assignRole('Tutor');

    }
}
