<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Funcion;

class FuncionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $funciones = [
            'listar usuarios',
            'listar proyectos',
            'crear usuario',
            'crear proyecto',
            'listar roles',
            'crear rol'
        ];
        foreach ($funciones as $funcion) {
            Funcion::create([
                'name' => $funcion
            ]);
        }
    }
}
