<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Observers\UsuarioObserver;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['username', 'password'];
    protected $hidden = ['password', 'remember_token'];

    public static function boot()
    {
        parent::boot();
        Usuario::observe(UsuarioObserver::class);
    }

    public function roles()
    {
        return $this->belongsToMany('App\Rol');
    }

    public function proyectos()
    {
        return $this->belongsToMany('App\Proyecto');
    }

    public function session()
    {
        return $this->hasOne('App\Session');
    }
}
