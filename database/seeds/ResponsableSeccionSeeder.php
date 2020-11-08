<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class ResponsableSeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create-resp_seccion']);
        Permission::create(['name' => 'read-resp_seccion']);
        Permission::create(['name' => 'update-resp_seccion']);
        Permission::create(['name' => 'delete-resp_seccion']);

        // or may be done by chaining

          $admin = Role::findByName('super-admin');
          $admin->givePermissionTo(['create-resp_seccion',
                          'read-resp_seccion',
                          'update-resp_seccion',
                          'read-resp_seccion',
                          'delete-resp_seccion']);

          $moderador = Role::findByName('moderador');
          $moderador->givePermissionTo(['create-resp_seccion',
                          'read-resp_seccion',
                          'update-resp_seccion',
                          'read-resp_seccion',
                          ]);



      }

    }

