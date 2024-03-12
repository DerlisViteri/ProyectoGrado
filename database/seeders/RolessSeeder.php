<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class RolessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'rol_descripcion'=>'Administrador',
            'rol_fecha'=>date('Y-m-d'),
            'created_at'=>date('Y-m-d')
        ]);
        DB::table('roles')->insert([
            'rol_descripcion'=>'Contador',
            'rol_fecha'=>date('Y-m-d'),
            'created_at'=>date('Y-m-d')
        ]);
        DB::table('roles')->insert([
            'rol_descripcion'=>'Programador',
            'rol_fecha'=>date('Y-m-d'),
            'created_at'=>date('Y-m-d')
        ]);
        DB::table('roles')->insert([
            'rol_descripcion'=>'Secretaria',
            'rol_fecha'=>date('Y-m-d'),
            'created_at'=>date('Y-m-d')
        ]);
    }
}
