<?php

namespace App\Observers;

use App\Session;
use App\Usuario;
use App\Bitacora;
use Illuminate\Support\Facades\Auth;

class UsuarioObserver
{
    // HELPING THIS URL--
    // https://laracasts.com/discuss/channels/general-discussion/model-events-and-observers-in-laravel-50?page=1
    // https://laracasts.com/discuss/channels/eloquent/where-to-register-model-events-observers
    // https://bosnadev.com/2014/12/28/laravel-model-observers/ ---- > GOOD
    
    public function retrieved(Usuario $user)
    {
       
    }

    public function saving(Usuario $user)
    {
    }

    public function saved(Usuario $user)
    {
        $token = session()->get('username');
        $data_old = implode(',', [$user->username, $user->password]);

        Bitacora::create([
            'data_new' => $data_old,
            'operacion' => 'INSERT-saved',
            'on_table' => 'usuario',
            'usuario' => $token
        ]);
    }

    public function created(Usuario $user)
    {
        $token = session()->get('username');
        $data_new = implode(',', [$user->username, $user->password]);

        Bitacora::create([
            'data_new' => $data_new,
            'operacion' => 'INSERT-created',
            'on_table' => 'usuario',
            'usuario' => $token
        ]);
    }

    public function creating(Usuario $user)
    {
        //
    }

    public function updating(Usuario $user)
    {
        $token = session()->get('username');
        $data_new = implode(',', [$user->username, $user->password]);

        Bitacora::create([
            'data_new' => $data_new,
            'operacion' => 'UPDATE-updating',
            'on_table' => 'usuario',
            'usuario' => $token
        ]);
        //
    }

    public function updated(Usuario $user)
    {
        $token = session()->get('username');
        $data_new = implode(',', [$user->username, $user->password]);

        Bitacora::create([
            'data_new' => $data_new,
            'operacion' => 'UPDATE-updated',
            'on_table' => 'usuario',
            'usuario' => $token
        ]);
    }

    public function deleting(Usuario $user)
    {
        //
    }

    public function deleted(Usuario $user)
    {
        $token = session()->get('username');
        $data_old = implode(',', [$user->username, $user->password]);

        Bitacora::create([
            'data_old' => $data_old,
            'operacion' => 'DELETE-deleted',
            'on_table' => 'usuario',
            'usuario' => $token
        ]);
    }

    public function restoring(Usuario $user)
    {
        //
    }

    public function restored(Usuario $user)
    {
        //
    }
}
