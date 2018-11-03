<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoletoUser extends Model
{
    protected $fillable = [
        'codigo', 'idboleto','idusuario'
    ];


    // Relacion de Boleto_Users con Boletos
    public function boleto()
    {
        // 1 boleto_Users pertenece a un Boleto
        return $this->belongsTo('App\Models\Boleto', 'id');
    }
}
