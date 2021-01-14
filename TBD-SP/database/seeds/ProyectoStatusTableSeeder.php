<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\ProyectoStatus;

class ProyectoStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $estados = [
            'proyecto_en_proceso',
            'proyecto_cancelado',
            'proyecto_eliminado',
            'proyecto_validado',
            'pendiente_de_verificacion'
        ];
        foreach ($estados as $estado) {
            ProyectoStatus::create(['name' => $estado]);
        }
    }
}
