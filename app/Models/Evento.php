<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Evento
 * @package App\Models
 * @version October 23, 2018, 4:01 pm UTC
 *
 * @property string nombre
 * @property string logo
 * @property string lugar
 * @property string descripcion
 * @property string website
 * @property date fecha
 * @property string hora
 * @property string mobile
 * @property string email
 * @property string latitud
 * @property string longitud
 * @property string ciudad
 * @property string poster
 */
class Evento extends Model
{
    use SoftDeletes;

    public $table = 'eventos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id',
        'nombre',
        'logo',
        'lugar',
        'descripcion',
        'website',
        'fecha',
        'hora',
        'mobile',
        'email',
        'latitud',
        'longitud',
        'ciudad',
        'poster'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'logo' => 'string',
        'lugar' => 'string',
        'descripcion' => 'string',
        'website' => 'string',
        'fecha' => 'date',
        'hora' => 'string',
        'mobile' => 'string',
        'email' => 'string',
        'latitud' => 'string',
        'longitud' => 'string',
        'ciudad' => 'string',
        'poster' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'lugar' => 'required',
        'fecha' => 'required',
        'mobile' => 'numeric',
        'email' => 'email',
        'latitud' => 'numeric',
        'longitud' => 'numeric',
        'ciudad' => 'required'
    ];

    // Relacion de Evento con Boletos:
    public function boletos()
    {
        // 1 evento tiene muchos boletos
        // $this hace referencia al objeto que tengamos instanciado en ese momento de Evento
        return $this->hasMany('App\Models\Boleto', 'idevento');
    }
}
