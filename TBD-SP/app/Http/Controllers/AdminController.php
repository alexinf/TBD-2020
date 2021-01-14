<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function usuarios()
    {
        $data = [];
        $users = \App\Usuario::all();
        // dd($users);
        foreach ($users as $user) {
            $roles = '';
            foreach ($user->roles as $rol) {
                $roles .= ','.$rol->name;
            }

            array_push($data, [
                'usuario'=> $user,
                'roles'=> (!empty($roles)? $roles : 'Sin Roles')
            ]);
        }

        return view('admin.usuarios', ['usuarios'=>$data]);
    }

    public function usuario()
    {
        $roles = \App\Rol::all();
        return view('admin.usuario', ['roles'=>$roles]);
    }

    public function store(Request $request)
    {
        //$input = $request->all();
        //var_dump($input);
        //exit;
        // Recover values POST
        $username = $request->input('username');
        $password = $request->input('password');

        $user = \App\Usuario::create(
                [
                    'username' => $username,
                    'password' => Hash::make($password)
                ]
        );

        if (!empty($request->input('roles'))) {
            $roles = $request->input('roles');
            // cuando el valor es on y cuando no es
            foreach ($roles as $key => $value) {
                if ($value === 'on') {
                    $user->roles()->attach($key, ['activo'=>true]);
                } else {
                    $user->roles()->attach($key, ['activo'=>$value]);
                }
            }
        }
        return redirect()->route('admin.users');
    }

    public function roles()
    {
        $roles = \App\Rol::all();
        return view('admin.roles', ['roles'=>$roles]);
    }

    public function role()
    {
        $funciones = \App\Funcion::all();
        return view('admin.rol', ['funciones'=>$funciones]);
    }

    public function store_role(Request $request)
    {
        $add = $request->input('rol_name');
    
        $rol = \App\Rol::create([
            'name'=>$add 
        ]);

        if (!empty($request->input('funciones'))) {
            $funciones = $request->input('funciones');
            // cuando el valor es on y cuando no es
            foreach ($funciones as $key => $value) {
                if ($value === 'on') {
                    $rol->funciones()->attach($key, ['activo'=>true]);
                } else {
                    $rol->funciones()->attach($key, ['activo'=>$value]);
                }
            }
        }
        return redirect()->route('admin.roles');
    }

    public function show_rol($id)
    {
        $rol = \App\Rol::find($id);
        $funciones_id = [];

        foreach ($rol->funciones as $funcion) {
            array_push($funciones_id, $funcion->id);
        }

        $funciones = \App\Funcion::all();
        return view('admin.update_rol', [
            'rol' => $rol,
            'rol_funcion' => $funciones_id,
            'funciones' => $funciones
        ]);
    }

    public function update_rol(Request $request, $id)
    {
        $rol = \App\Rol::find($id);
        $rol->funciones()->detach();

        if (!empty($request->input('funciones'))) {
            $funciones = $request->input('funciones');
            foreach ($funciones as $key => $value) {
                /*if ($value != 'null' && $value != 'on') {
                    $rol->funciones()->sync($key, ['activo' => $value]);
                } 
                elseif ($value == 'on') {
                    $rol->funciones()->attach($key, ['activo' => true]);
                } else {
                    $rol->funciones()->attach($key, ['activo'=>$value]);
                }*/
                if ($value == 'on') {
                    $rol->funciones()->attach($key, ['activo' => true]);
                } elseif ($value != 'null') {
                    $rol->funciones()->attach($key, ['activo' => $value]);
                }
            }
        }
        return redirect()->route('admin.roles');
    }

    public function funciones()
    {
        $funciones = \App\Funcion::all();
        return view('admin.funciones', ['funciones' => $funciones]);
    }

    public function funcion()
    {
        $uis = \App\Ui::all();
        return view('admin.funcion', ['uis' => $uis]);
    }

    public function store_funcion(Request $request)
    {
        $funcion_name = $request->input('funcion');
    
        $funcion = \App\Funcion::create([
            'name'=>$funcion_name 
        ]);

        if (!empty($request->input('uis'))) {
            $uis = $request->input('uis');
            // cuando el valor es on y cuando no es
            foreach ($uis as $key => $value) {
                if ($value === 'on') {
                    $funcion->uis()->attach($key, ['activo'=>true]);
                } else {
                    $funcion->uis()->attach($key, ['activo'=>$value]);
                }
            }
        }
        return redirect()->route('home');
    }

    public function show_funcion($id)
    {
        $funcion = \App\Funcion::find($id);
        $uis = \App\Ui::all();
        $uis_id = [];

        foreach ($funcion->uis as $ui) {
            array_push($uis_id, $ui->id);
        }

        return view('admin.update_funcion', [
            'funcion' => $funcion,
            'uis' => $uis,
            'funcion_ui' => $uis_id
        ]);
    }

    public function update_funcion(Request $request, $id)
    {
        $funcion = \App\Funcion::find($id);
        $funcion->uis()->detach();

        if (!empty($request->input('uis'))) {
            $uis = $request->input('uis');
            foreach ($uis as $key => $value) {
                if ($value == 'on') {
                    $funcion->uis()->attach($key, ['activo' => true]);
                } elseif ($value != 'null') {
                    $funcion->uis()->attach($key, ['activo' => $value]);
                }
            }
        }
        return redirect()->route('home');
    }

    public function uis()
    {
        $uis = \App\Ui::all();
        return view('admin.uis', ['uis' => $uis]);
    }

    public function ui()
    {
        return view('admin.ui');
    }

    public function store_ui(Request $request)
    {
        $add = $request->input('ui');
        \App\Ui::create(['name' => $add]);
        return redirect()->route('home');
    }
}
