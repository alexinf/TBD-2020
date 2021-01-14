<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Usuario;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$faker = Faker::create();
        $usuarios = [
            'admin',
            'carlo',
            'maria',
            'ramon',
        ];
        foreach ($usuarios as $usuario) {
            Usuario::create(
                [
                    'username' => $usuario,
                    'password' => Hash::make($usuario)
                ]
            );
        }
    }
}
