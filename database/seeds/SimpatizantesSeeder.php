<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class SimpatizantesSeeder extends Seeder
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
      Permission::create(['name' => 'create-simpatizantes']);
      Permission::create(['name' => 'read-simpatizantes']);
      Permission::create(['name' => 'update-simpatizantes']);
      Permission::create(['name' => 'delete-simpatizantes']);

      // or may be done by chaining

        $admin = Role::findByName('super-admin');
        $admin->givePermissionTo(['create-simpatizantes',
                        'read-simpatizantes',
                        'update-simpatizantes',
                        'read-simpatizantes',
                        'delete-simpatizantes']);

        $moderador = Role::findByName('moderador');
        $moderador->givePermissionTo(['create-simpatizantes',
                        'read-simpatizantes',
                        'update-simpatizantes',
                        'read-simpatizantes',
                        ]);

        $rs = Role::findByName('responsable-seccion');
        $rs->givePermissionTo(['create-simpatizantes',
                            'read-simpatizantes',
                            'update-simpatizantes',
                            'read-simpatizantes',
                            ]);

        $rm = Role::findByName('responsable-manzana');
        $rm->givePermissionTo(['create-simpatizantes',
                        'read-simpatizantes',
                        'update-simpatizantes',
                        'read-simpatizantes',
                        ]);

        $anfitrion = Role::findByName('anfitrion');
        $anfitrion->givePermissionTo(['create-simpatizantes',
                        'read-simpatizantes',
                        'update-simpatizantes',
                        'read-simpatizantes',
                        ]);

    }
}
