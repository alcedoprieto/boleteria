<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Boleto
 * @package App\Models
 * @version October 26, 2018, 3:06 am UTC
 *
 * @property string codigo
 * @property float valor
 * @property float iva
 * @property date inicio
 * @property date fin
 * @property integer idevento
 * @property integer iduser
 * @property boolean activo
 */
class Boleto extends Model
{
    use SoftDeletes;

    public $table = 'boletos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'codigo',
        'valor',
        'iva',
        'inicio',
        'fin',
        'idevento',
        'iduser',
        'activo',
        'cantidad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'codigo' => 'string',
        'valor' => 'float',
        'iva' => 'float',
        'inicio' => 'date',
        'fin' => 'date',
        'idevento' => 'integer',
        'iduser' => 'integer',
        'activo' => 'boolean',
        'cantidad' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'codigo' => 'required',
        'valor' => 'required', 'numeric',
        'iva' => 'numeric',
        'idevento' => 'required',
        'cantidad' => 'required', 'numeric'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    
    // Relacion de Boleto con Evento
    public function evento()
    {
        // 1 boleto pertenece a un Evento
        // $this hace referencia al objeto que tenemos en ese momento de Boleto.
        return $this->belongsTo('App\Models\Evento','id');
    }

    // Relacion de Boleto con Boleto_Users:
    public function tickets()
    {
        // 1 boleto tiene muchos boleto_users
        return $this->hasMany('App\BoletoUser', 'idboleto');
    }
}
