<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Reset cached roles and permissions
      app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

      // create permissions
      Permission::create(['name' => 'create-users']);
      Permission::create(['name' => 'read-users']);
      Permission::create(['name' => 'update-users']);
      Permission::create(['name' => 'delete-users']);

      Permission::create(['name' => 'create-roles']);
      Permission::create(['name' => 'read-roles']);
      Permission::create(['name' => 'update-roles']);
      Permission::create(['name' => 'delete-roles']);

      Permission::create(['name' => 'create-permissions']);
      Permission::create(['name' => 'read-permissions']);
      Permission::create(['name' => 'update-permissions']);
      Permission::create(['name' => 'delete-permissions']);

      Permission::create(['name' => 'create-electores']);
      Permission::create(['name' => 'read-electores']);
      Permission::create(['name' => 'update-electores']);
      Permission::create(['name' => 'delete-electores']);

      // or may be done by chaining
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'moderador'])
          ->givePermissionTo(['read-users','read-electores' ,'read-roles','read-permissions']);

        $role = Role::create(['name' => 'responsable-seccion']);

        $role = Role::create(['name' => 'responsable-manzana']);

        $role = Role::create(['name' => 'anfitrion']);

    }
}
