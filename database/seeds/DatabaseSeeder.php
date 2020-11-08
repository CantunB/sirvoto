<?php

use App\ResponsableManzana;
use App\ResponsableSeccion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RolesAndPermissions::class);
         $this->call(UserSeeder::class);
         $this->call(AnfitrionesSeeder::class);
         $this->call(SimpatizantesSeeder::class);
         $this->call(ResponsableSeccionSeeder::class);
         $this->call(ResponsableManzanaSeeder::class);
    }
}
