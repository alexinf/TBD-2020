<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = 'bitacora';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];
}
