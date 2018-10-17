<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class valorboleto
 * @package App\Models
 * @version October 17, 2018, 8:32 pm UTC
 *
 * @property string nombre
 * @property string descripcion
 * @property float valor
 * @property float iva
 * @property boolean activo
 */
class valorboleto extends Model
{
    use SoftDeletes;

    public $table = 'valorboletos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'descripcion',
        'valor',
        'iva',
        'activo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'descripcion' => 'string',
        'valor' => 'float',
        'iva' => 'float',
        'activo' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'valor' => 'required',
        'iva' => 'numeric'
    ];

    
}
