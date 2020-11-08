<?php

use Illuminate\Database\Seeder;
use SIRVOTO\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //usuario con el rol escritor
        $moderador  = User::create([
            'name' => 'Bernabe Cantun',
            'email' => 'cantunberna97@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234')
        ]);
        $moderador->assignRole('moderador');

        //usuario con el rol super-administrador
        $admin  = User::create([
            'name' => 'BernaCantun',
            'email' => 'cantunberna@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234')
        ]);
        $admin->assignRole('super-admin');
    }
}
