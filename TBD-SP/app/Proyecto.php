<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyecto';
    protected $primaryKey = 'id'; 
    public $timestamps = false;

    protected $fillable = [
        'tipo_proyecto_id',
        'dependencia_academica_id',
        'proyecto_status_id',
        'area_academica_id'
    ];

    public function tipo_proyecto()
    {
        return $this->belongsTo('App\TipoProyecto');
    }

    public function dependencia_academica()
    {
        return $this->belongsTo('App\DependenciaAcademica');
    }

    public function proyecto_status()
    {
        return $this->belongsTo('App\ProyectoStatus');
    }

    public function area_academica()
    {
        return $this->belongsTo('App\AreaAcademica');
    }

    public function usuarios()
    {
        return $this->belongsToMany('App\Usuario');
    }
}
