<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ui extends Model
{
    protected $table = 'ui';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['name'];

    public function funciones()
    {
        return $this->belongsToMany('App\Funcion');
    }
}
