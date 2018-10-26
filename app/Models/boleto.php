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
        'activo'
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
        'activo' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'codigo' => 'required',
        'valor' => 'required, numeric',
        'iva' => 'numeric',
        'idevento' => 'required'
    ];

    
}
