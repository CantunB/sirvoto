<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class AnfitrionesSeeder extends Seeder
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
        Permission::create(['name' => 'create-anfitriones']);
        Permission::create(['name' => 'read-anfitriones']);
        Permission::create(['name' => 'update-anfitriones']);
        Permission::create(['name' => 'delete-anfitriones']);

        // or may be done by chaining

            $admin = Role::findByName('super-admin');
            $admin->givePermissionTo(['create-anfitriones',
                            'read-anfitriones',
                            'update-anfitriones',
                            'read-anfitriones',
                            'delete-anfitriones']);

            $moderador = Role::findByName('moderador');
            $moderador->givePermissionTo(['create-anfitriones',
                            'read-anfitriones',
                            'update-anfitriones',
                            'read-anfitriones',
                            ]);
            $rs = Role::findByName('responsable-seccion');
            $rs->givePermissionTo(['create-anfitriones',
                            'read-anfitriones',
                            'update-anfitriones',
                            'read-anfitriones',
                            ]);

            $rm = Role::findByName('responsable-manzana');
            $rm->givePermissionTo(['create-anfitriones',
                        'read-anfitriones',
                        'update-anfitriones',
                        'read-anfitriones',
                        ]);




    }
}
