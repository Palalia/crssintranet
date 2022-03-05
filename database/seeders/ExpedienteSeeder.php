<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use App\Models\Campus;
class ExpedienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'nombre'=>'cliente1'
        ]); 
        Cliente::create([
            'nombre'=>'cliente2'
        ]);
        Cliente::create([
            'nombre'=>'cliente3'
        ]);  
        DB::table('estados')
        ->insert([
            'nombre'=>'Aguascalientes', 
            'nombre'=>'Baja California', 
            'nombre'=>'Baja California Sur', 
            'nombre'=>'Campeche', 
            'nombre'=>'Chiapas', 
            'nombre'=>'Chihuahua', 
            'nombre'=>'Ciudad de México', 
            'nombre'=>'Coahuila', 
            'nombre'=>'Colima', 
            'nombre'=>'Durango', 
            'nombre'=>'Estado de México',
            'nombre'=>'Guanajuato', 
            'nombre'=>'Guerrero', 
            'nombre'=>'Hidalgo', 
            'nombre'=>'Jalisco', 
            'nombre'=>'Michoacán', 
            'nombre'=>'Morelos', 
            'nombre'=>'Nayarit', 
            'nombre'=>'Nuevo León',
            'nombre'=>'Oaxaca', 
            'nombre'=>'Puebla', 
            'nombre'=>'Querétaro', 
            'nombre'=>'Quintana Roo',
            'nombre'=>'San Luis Potosí',
            'nombre'=>'Sinaloa',
            'nombre'=>'Sonora',
            'nombre'=>'Tabasco',
            'nombre'=>'Tamaulipas', 
            'nombre'=>'Tlaxcala',
            'nombre'=>'Yucatán',
            'nombre'=>'Veracruz',
            'nombre'=>'Zacatecas',
        ]);
        Campus::create([
            'nombre'=>'campus1',
            'direccion'=>'calle falsa #283',
            'url_maps'=>'www.google-maps.com',
            'cantidad_personal'=>10,
            'sueldo_autorizado'=>6000,
            'idestado'=>'1',
            'idcliente'=>'1',
        ]);
        Campus::create([
            'nombre'=>'campus2',
            'direccion'=>'calle falsa #394',
            'url_maps'=>'www.google-maps.com',
            'cantidad_personal'=>10,
            'sueldo_autorizado'=>6000,
            'idestado'=>'2',
            'idcliente'=>'2',
        ]);
    }
}
