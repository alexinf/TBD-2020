<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectoDetalle extends Model
{
    protected $table = 'proyecto_detalle';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'proyecto_id',
        'titulo_proyecto',
        'resumen_proyecto'
    ];
}
