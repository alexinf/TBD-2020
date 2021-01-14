<?php

namespace App\Http\Controllers;

use App\Home;
use Illuminate\Http\Request;
// para verificar si un usuario esta authentificado
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //https://laravel.com/docs/5.0/authentication#retrieving-the-authenticated-user
    //https://stackoverflow.com/questions/17835886/laravel-authuser-id-tying-to-get-a-property-of-a-non-object
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login.get');
        }
        // Auth::User() tiene todos los valores del usuario autentificado
        //echo Auth::User()->id;
        //echo session('username');
        $id = Auth::User()->id;
        $user = \App\Usuario::find($id);
        $roles = $user->roles;
        return view('home', ['roles'=>$roles]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show($rol_id)
    {
        $data = [];
        $rol = \App\Rol::findOrFail($rol_id);
        $funciones = $rol->funciones;
        foreach ($funciones as $funcion) {
            $name = $funcion->name;
            //$uis = $funcion->uis()->firstOrFail();
            // AKA se verifica si una funcion tiene asociada una ui
            $ui = $funcion->uis->first();
            if (!$ui) {
                continue;
            }
            $_ui = $ui->name;
            array_push($data, ['funcion'=>$name, 'ui'=>$_ui]);
        }
        return view('show', ['data'=>$data]);
    }

}
