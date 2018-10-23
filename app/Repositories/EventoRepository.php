<?php

namespace App\Repositories;

use App\Models\Evento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EventoRepository
 * @package App\Repositories
 * @version October 23, 2018, 4:01 pm UTC
 *
 * @method Evento findWithoutFail($id, $columns = ['*'])
 * @method Evento find($id, $columns = ['*'])
 * @method Evento first($columns = ['*'])
*/
class EventoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Evento::class;
    }
}
