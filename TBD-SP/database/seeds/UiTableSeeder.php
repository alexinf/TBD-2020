<?php

use Illuminate\Database\Seeder;
use App\Ui;

class UiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $uis = [
            'admin/usuarios',
            'admin/usuario',
            'admin/roles',
            'admin/role',
            'academico/proyectos',
            'academico/proyecto',
            'director/proyectos',
            'revisor/no-revisados',
            'revisor/revisados'
        ];
        foreach ($uis as $ui) {
            Ui::create(
                ['name'=>$ui]
            );
        }
    }
}
