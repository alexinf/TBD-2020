<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['name'];

    public function usuarios()
    {
        return $this->belongsToMany('App\Usuario');
    }

    public function funciones()
    {
        return $this->belongsToMany('App\Funcion');
    }
}
