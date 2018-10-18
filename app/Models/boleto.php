<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class boleto
 * @package App\Models
 * @version October 18, 2018, 2:27 am UTC
 *
 * @property string codigo
 * @property integer idvalor
 * @property boolean activo
 * @property integer idevento
 * @property integer iduser
 */
class boleto extends Model
{
    use SoftDeletes;

    public $table = 'boletos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'codigo',
        'idvalor',
        'activo',
        'idevento',
        'iduser'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'codigo' => 'string',
        'idvalor' => 'integer',
        'activo' => 'boolean',
        'idevento' => 'integer',
        'iduser' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'codigo' => 'required',
        'idvalor' => 'required',
        'idevento' => 'required'
    ];

    
}
