<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Rol;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $roles = ['administrador', 'director', 'revisor', 'academico'];
        foreach ($roles as $rol) {
            Rol::create(['name'=> $rol]);
        }
    }
}
