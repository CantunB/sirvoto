<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class ResponsableManzanaSeeder extends Seeder
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
        Permission::create(['name' => 'create-resp_manzana']);
        Permission::create(['name' => 'read-resp_manzana']);
        Permission::create(['name' => 'update-resp_manzana']);
        Permission::create(['name' => 'delete-resp_manzana']);

        // or may be done by chaining

            $admin = Role::findByName('super-admin');
            $admin->givePermissionTo(['create-resp_manzana',
                            'read-resp_manzana',
                            'update-resp_manzana',
                            'read-resp_manzana',
                            'delete-resp_manzana']);

            $moderador = Role::findByName('moderador');
            $moderador->givePermissionTo(['create-resp_manzana',
                            'read-resp_manzana',
                            'update-resp_manzana',
                            'read-resp_manzana',
                            ]);

            $rs = Role::findByName('responsable-seccion');
            $rs->givePermissionTo(['create-resp_manzana',
                            'read-resp_manzana',
                            'update-resp_manzana',
                            'read-resp_manzana',
                            ]);


    }
}
