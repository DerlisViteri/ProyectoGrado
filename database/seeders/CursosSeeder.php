<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('cursos')->insert([
            'cur_titulo'=>'Programar',
            'cur_descripcion'=>date('Y-m-d'),
            'cur_grupo'=>'G1',
            'cur_estado'=>'1',
            'created_at'=>date('Y-m-d')
        ]);
        DB::table('cursos')->insert([
            'cur_titulo'=>'Cantar',
            'cur_descripcion'=>date('Y-m-d'),
            'cur_grupo'=>'C1',
            'cur_estado'=>'1',
            'created_at'=>date('Y-m-d')
        ]);
        DB::table('cursos')->insert([
            'cur_titulo'=>'Bailar',
            'cur_descripcion'=>date('Y-m-d'),
            'cur_grupo'=>'B1',
            'cur_estado'=>'1',
            'created_at'=>date('Y-m-d')
        ]);
    }
}
