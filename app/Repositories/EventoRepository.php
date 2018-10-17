<?php

namespace App\Repositories;

use App\Models\Evento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EventoRepository
 * @package App\Repositories
 * @version October 17, 2018, 5:06 pm UTC
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
        'descripcion',
        'email',
        'logo',
        'fecha',
        'hora'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Evento::class;
    }
}
