<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'session';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['usuario_id', 'token', 'activo'];

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }
}
