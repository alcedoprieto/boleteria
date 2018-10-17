<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Evento
 * @package App\Models
 * @version October 17, 2018, 5:06 pm UTC
 *
 * @property string nombre
 * @property string descripcion
 * @property string email
 * @property string logo
 * @property date fecha
 * @property time hora
 */
class Evento extends Model
{
    use SoftDeletes;

    public $table = 'eventos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'descripcion',
        'email',
        'logo',
        'fecha',
        'hora'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'descripcion' => 'string',
        'email' => 'string',
        'logo' => 'string',
        'fecha' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'email' => 'email',
        'fecha' => 'required'
    ];

    
}
