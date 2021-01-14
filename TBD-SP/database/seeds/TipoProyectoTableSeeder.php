<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\TipoProyecto;

class TipoProyectoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $tipos = ['por_convocatoria', 'proyecto_grado'];
        foreach ($tipos as $tipo) {
            TipoProyecto::create(
                [
                    'name' => $tipo
                ]
            );
        }
    }
}
