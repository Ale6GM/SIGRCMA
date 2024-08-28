<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creacion de los Roles
        $role1 = Role::create(['name'=>'Administrador']);
        $role2 = Role::create(['name' => 'Registrador']);
        $role3 = Role::create(['name' => 'Supervisor']);

        //Creacion de los Permisos

        // Permisos para los Usuarios

        Permission::create(['name' => 'users.index', 'description' => 'Ver Lista de Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.create', 'description' => 'Crear Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.store', 'description' => 'Guardar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit', 'description' => 'Editar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.update', 'description' => 'Actualizar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.destroy', 'description' => 'Eliminar Usuarios'])->syncRoles([$role1]);

        // Permisos para el dashboard

        Permission::create(['name' => 'dashboard', 'description' => 'Ver el Dashboard'])->syncRoles([$role1, $role2, $role3]);

        //Permisos para los Clientes
        Permission::create(['name' => 'admin.clientes.index', 'description' => 'Ver Lista de Clientes'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.clientes.create', 'description' => 'Crear un nuevo Cliente'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.clientes.store', 'description' => 'Guardar un Nuevo Cliente'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.clientes.edit', 'description' => 'Editar Clientes'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.clientes.update', 'description' => 'Actualizar Clientes'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.clientes.destroy', 'description' => 'Eliminar Clientes'])->syncRoles([$role1]);

        //Permisos para los Establecimientos
        Permission::create(['name' => 'admin.establecimientos.index', 'description' => 'Ver lista de Establecimientos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.establecimientos.create', 'description' => 'Crear Establecimientos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.establecimientos.store', 'description' => 'Guardar Establecimientos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.establecimientos.edit', 'description' => 'Editar Establecimientos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.establecimientos.update', 'description' => 'Actualizar Establecimientos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.establecimientos.destroy', 'description' => 'Eliminar Establecimientos'])->syncRoles([$role1]);
        
        // Permisos para los Tecnicos

        Permission::create(['name' => 'admin.tecnicos.index', 'description' => 'Ver lista de Tecnicos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.tecnicos.create', 'description' => 'Crear Tecnicos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tecnicos.store', 'description' => 'Guardar un Tecnico'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tecnicos.edit', 'description' => 'Editar Tecnicos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tecnicos.update', 'description' => 'Actualizar Tecnicos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tecnicos.destroy', 'description' => 'Eliminar Tecnicos'])->syncRoles([$role1]);

        // Permisos para los Reportes

        Permission::create(['name' => 'admin.reportes.index', 'description' => 'Ver lista de Reportes'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.reportes.create', 'description' => 'Crear Reportes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.reportes.store', 'description' => 'Guardar Reportes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.reportes.edit', 'description' => 'Editar Reportes'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.reportes.update', 'description' => 'Actualizar Reportes'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.reportes.destroy', 'description' => 'Eliminar Reportes'])->syncRoles([$role1]);

        //Permisos para los Trabajos

        Permission::create(['name' => 'admin.trabajos.index', 'description' => 'Ver lista de Trabajos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.trabajos.create', 'description' => 'Crear Trabajos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.trabajos.store', 'description' => 'Guardar Trabajos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.trabajos.edit', 'description' => 'Editar Trabajos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.trabajos.update', 'description' => 'Actualizar Trabajos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.trabajos.destroy', 'description' => 'Eliminar Trabajos'])->syncRoles([$role1]);

        // Permisos para las estadisticas

        Permission::create(['name' => 'admin.estadisticas.index', 'description' => 'Ver Estadisticas'])->syncRoles([$role1, $role2, $role3]);

        // Permisos para las exportaciones Globales
        
        Permission::create(['name' => 'exportar_clientes', 'description' => 'Exportar Clientes'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'exportar_locales', 'description' => 'Exportar Locales'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'exportar_reportes', 'description' => 'Exportar Reportes'])->syncRoles([$role1, $role2, $role3]);
    }
}
