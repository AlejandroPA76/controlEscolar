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
            
            'tutores_index',
            'tutores_create',
            'tutores_show',
            'tutores_edit',
            'tutores_destroy',
            
            'docentes_index',
            'docentes_create',
            'docentes_show',
            'docentes_edit',
            'docentes_destroy',

            'estudiantes_index',
            'estudiantes_create',
            'estudiantes_show',
            'estudiantes_edit',
            'estudiantes_destroy',
            
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
            
            'pagos_index',
            'pagos_create',
            'pagos_show',
            'pagos_edit',
            'pagos_destroy',
            
            'ciclos_index',
            'ciclos_create',
            'ciclos_show',
            'ciclos_edit',
            'ciclos_destroy',
            
            'niveles_index',
            'niveles_create',
            'niveles_show',
            'niveles_edit',
            'niveles_destroy',
            
            'historial_index',
            'historial_create',
            'historial_show',
            'historial_edit',
            'historial_destroy',

            'mis_estudiantes_index',
            'mis_observaciones_index',

            'observaciones_index',
            'observaciones_create',
            'observaciones_show',
            'observaciones_edit',
            'observaciones_destroy',

            'roles_superadmin',
            'roles_tutor',
            'roles_docente',

            'mispagos_index',
            'subir_index',
            


        ];

        foreach($permissions as $permission){
            Permission::create([
                'name'=>$permission
            ]);
        }
    }
}
