<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $usuario = User::create([
            'name'=> 'alan',
            'email'=> 'c3za1@gmail.com',
            'password'=> bcrypt('12345678')
        ]);

       // $rol = Role::create(['name'=>'ADMINISTRADOR']);

       // $permisos = Permission::pluck('id', 'id')->all();

       // $rol->syncPermissions($permisos);

        $usuario->assignRole('ADMINISTRADOR');
    }
}

//EJECUTAMOS EN CMD PARA GUARDAR UN USUARIO
//  php artisan db:seed --class SuperAdminSeeder
