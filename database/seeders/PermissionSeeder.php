<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=[
            'permission_index',
            'permission_create',
            'permission_show',
            'permission_edit',
            'permission_destroy',

            'role_index',
            'role_create',
            'role_show',
            'role_edit',
            'role_destroy',
            
            'user_index',
            'user_create',
            'user_show',
            'user_edit',
            'user_destroy',
            // --------
            
            'tutor_index',
            'tutor_create',
            'tutor_show',
            'tutor_edit',
            'tutor_destroy',
            
            'docente_index',
            'docente_create',
            'docente_show',
            'docente_edit',
            'docente_destroy',

            'estudiante_index',
            'estudiante_create',
            'estudiante_show',
            'estudiante_edit',
            'estudiante_destroy',
            
            'admin_index',
            'admin_create',
            'admin_show',
            'admin_edit',
            'admin_destroy',
            
            'grupos_index',
            'grupos_create',
            'grupos_show',
            'grupos_edit',
            'grupos_destroy',

            'observaciones_index',
            'observaciones_create',
            'observaciones_show',
            'observaciones_edit',
            'observaciones_destroy',
            


        ];

        foreach($permissions as $permission){
            Permission::create([
                'name'=>$permission
            ]);
        }
    }
}
