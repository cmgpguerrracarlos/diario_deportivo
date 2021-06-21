<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => "Admin"]); //Creo roles
        $role2 = Role::create(['name' => "Editor"]);
        $role3 = Role::create(['name' => "Normal"]);

        Permission::create(['name' => 'jugadores.create'])->assignRole($role1); //Creo y asigno permisos a un rol en particular
        Permission::create(['name' => 'jugadores.index'])->syncRoles([$role1, $role2, $role3]); //Creo permisos y se lo asigno a varios usuarios
        Permission::create(['name' => 'jugadores.edit'])->assignRole($role1);
        Permission::create(['name' => 'jugadores.destroy'])->assignRole($role1);

        Permission::create(['name' => 'roles.index'])->syncRoles($role1);
        Permission::create(['name' => 'roles.update'])->assignRole($role1);
        Permission::create(['name' => 'roles.destroy'])->assignRole($role1);

        Permission::create(['name' => 'equipos.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'equipos.update'])->assignRole($role1);
        Permission::create(['name' => 'equipos.create'])->assignRole($role1);
        Permission::create(['name' => 'equipos.destroy'])->assignRole($role1);

        Permission::create(['name' => 'noticias.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'noticias.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'noticias.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'noticias.destroy'])->syncRoles($role1, $role2);

        Permission::create(['name' => 'ligas.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'ligas.update'])->assignRole($role1);
        Permission::create(['name' => 'ligas.create'])->assignRole($role1);
        Permission::create(['name' => 'ligas.destroy'])->assignRole($role1);

        Permission::create(['name' => 'panel.administracion'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'partidos.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'partidos.update'])->assignRole($role1);
        Permission::create(['name' => 'partidos.create'])->assignRole($role1);
        Permission::create(['name' => 'partidos.destroy'])->assignRole($role1);

        Permission::create(['name' => 'estadisticas.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'estadisticas.update'])->assignRole($role1);
        Permission::create(['name' => 'estadisticas.create'])->assignRole($role1);
        Permission::create(['name' => 'estadisticas.destroy'])->assignRole($role1);
        
        /*$role->revokePermissionTo($permission); opciones para revocar permisos
        $permission->removeRole($role);*/
    }
}
