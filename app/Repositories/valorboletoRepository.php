<?php

namespace App\Repositories;

use App\Models\valorboleto;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class valorboletoRepository
 * @package App\Repositories
 * @version October 17, 2018, 8:32 pm UTC
 *
 * @method valorboleto findWithoutFail($id, $columns = ['*'])
 * @method valorboleto find($id, $columns = ['*'])
 * @method valorboleto first($columns = ['*'])
*/
class valorboletoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'valor',
        'iva',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return valorboleto::class;
    }
}
