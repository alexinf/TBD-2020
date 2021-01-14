<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsuarioTableSeeder::class);
        //$this->call(RolTableSeeder::class);
        $this->call(TipoProyectoTableSeeder::class);
        $this->call(DependenciaAcademicaTableSeeder::class);
        $this->call(ProyectoStatusTableSeeder::class);
        $this->call(AreaAcademicaTableSeeder::class);
        $this->call(UsuarioTableSeeder::class);
        $this->call(UiTableSeeder::class);
        $this->call(RolTableSeeder::class);
        $this->call(FuncionTableSeeder::class);
    }
}
