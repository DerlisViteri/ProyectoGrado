<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
             'rol_id'=>1,
             'name'=>'Alexander',
            'usu_nombres'=>'Alexander Sanchez',
            'usu_telefono'=>'0988094693',
            'email'=>'alesanchez@gmail.com',
            'password'=>bcrypt('123456')
        ]);

         DB::table('users')->insert([
             'rol_id'=>4,
             'name'=>'Byran',
            'usu_nombres'=>'Bryan Sanchez',
            'usu_telefono'=>'0988094693',
            'email'=>'bryansanchez@gmail.com',
            'password'=>bcrypt('123456')
        ]);

        DB::table('users')->insert([
            'rol_id'=>2,
            'name'=>'sebas',
            'usu_nombres'=>'Sebastian',
            'usu_telefono'=>'0988094645',
            'email'=>'sebassanchez@gmail.com',
            'password'=>bcrypt('12345678')
        ]);

        DB::table('users')->insert([
             'rol_id'=>3,
             'name'=>'Eli',
            'usu_nombres'=>'Elizabeth',
            'usu_telefono'=>'0988094612',
            'email'=>'Elizabethguz@gmail.com',
            'password'=>bcrypt('1234578')
        ]);
    }
}
