<?php

namespace App\Repositories;

use App\Models\evento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class eventoRepository
 * @package App\Repositories
 * @version October 18, 2018, 2:19 am UTC
 *
 * @method evento findWithoutFail($id, $columns = ['*'])
 * @method evento find($id, $columns = ['*'])
 * @method evento first($columns = ['*'])
*/
class eventoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'email',
        'logo',
        'fecha'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return evento::class;
    }
}
