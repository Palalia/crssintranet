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
        $rol = Role::create(['name'=>'ADMINISTRADOR']);
        $permisos = Permission::all();
        $rol->syncPermissions($permisos);
        $usuario->assignRole('ADMINISTRADOR');
    ///////////////////////////////////////////////////////
         $usuario = User::create([
            'name'=> 'Guardia1',
            'email'=> 'algo@gmail.com',
         'password'=> bcrypt('12345678')
        ]);
        $rol = Role::create(['name'=>'GUARDIA']);
        $permisos = [
            Permission::where('id','1')->first(),
            Permission::where('id','5')->first()
        ];
        $rol->syncPermissions($permisos);
        $usuario->assignRole('GUARDIA');
    }
}

//EJECUTAMOS EN CMD PARA GUARDAR UN USUARIO
//  php artisan db:seed --class SuperAdminSeeder
