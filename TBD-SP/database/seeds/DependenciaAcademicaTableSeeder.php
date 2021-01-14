<?php

use Illuminate\Database\Seeder;
use App\DependenciaAcademica;

class DependenciaAcademicaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dependencias = [
            'Facultad de Arquitectura',
            'Facultad Economica',
            'Facultad de Derecho',
            'Facultad Tecnologia',
            'Facultad Humanidades',
            'Facultad Contaduria y Administracion'
        ];
        foreach ($dependencias as $dependencia) {
            DependenciaAcademica::create(['name'=>$dependencia]);
        }
    }
}
