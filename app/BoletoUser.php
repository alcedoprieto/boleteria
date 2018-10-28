<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoletoUser extends Model
{
    protected $fillable = [
        'codigo', 'idboleto','idusuario'
    ];
}
