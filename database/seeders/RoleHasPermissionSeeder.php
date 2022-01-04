<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SuperAdmin
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        // Admin
        $user_permissions = $admin_permissions->filter(function($permission) {
            return substr($permission->name, 0, 5) != 'user_' &&
                substr($permission->name, 0, 5) != 'role_' &&
                substr($permission->name, 0, 14) != 'observaciones_' &&
                substr($permission->name, 0, 11) != 'permission_';
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);
        
        // Docente
        $user_permissions = $admin_permissions->filter(function($permission) {
            return substr($permission->name, 0, 5) != 'user_' &&
                substr($permission->name, 0, 5) != 'role_' &&
                substr($permission->name, 0, 11) != 'permission_'&&
                substr($permission->name, 0, 8) != 'tutores_'&&
                substr($permission->name, 0, 6) != 'pagos_'&&
                substr($permission->name, 0, 9) != 'docentes_'&&
                substr($permission->name, 0, 7) != 'grupos_'&&
                substr($permission->name, 0, 14) != 'observaciones_';
        });
        Role::findOrFail(3)->permissions()->sync($user_permissions);
        
        // tutor
        $user_permissions = $admin_permissions->filter(function($permission) {
            return substr($permission->name, 0, 5) != 'user_' &&
                substr($permission->name, 0, 5) != 'role_' &&
                substr($permission->name, 0, 11) != 'permission_' &&
                substr($permission->name, 0, 8) != 'tutores_' &&
                substr($permission->name, 0, 7) != 'grupos_' &&
                substr($permission->name, 0, 12) != 'estudiantes_' &&
                substr($permission->name, 0, 9) != 'docentes_';

                // return str_contains($permission->name, 0, 5) != 'user_';
        });
        Role::findOrFail(4)->permissions()->sync($user_permissions);

    }
}
