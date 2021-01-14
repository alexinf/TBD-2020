<?php

use Illuminate\Database\Seeder;
use App\AreaAcademica;

class AreaAcademicaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            'economico',
            'administrativo',
            'academico',
            'quimico',
            'quimico biologico',
            'judicial penal',
            'tecnologico',
            'social humanitario'
        ];
        foreach ($areas as $area) {
            AreaAcademica::create(['name'=>$area]);
        }
    }
}
