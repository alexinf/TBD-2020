<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaAcademica extends Model
{
    protected $table = 'area_academica';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['name'];

    public function proyectos()
    {
        return $this->hasMany('App\Proyecto');
    }
}
