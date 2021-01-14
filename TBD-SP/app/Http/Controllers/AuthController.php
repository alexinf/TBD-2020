<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $r)
    {
        if (Auth::attempt([
                            'username'=>$r->username,
                            'password'=>$r->password
                            ], false)
            ) {

            $r->session()->put('username', $r->username);

            $id = Auth::User()->id;
            $token = $r->session()->get('_token');

            \App\Session::create([
                'usuario_id' => $id,
                'token' => $token,
                'activo' => true
            ]);

            return redirect()->route('home');
            print_r($token);
        } else {
            return redirect()->route('login.get');
        }
    }

    public function logout()
    {
        \App\Usuario::find(Auth::User()->id)->session->delete();
        Auth::logout();
        return redirect()->route('home');
    }
}
