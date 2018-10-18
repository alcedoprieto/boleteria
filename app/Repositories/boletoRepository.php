<?php

namespace App\Repositories;

use App\Models\boleto;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class boletoRepository
 * @package App\Repositories
 * @version October 18, 2018, 2:27 am UTC
 *
 * @method boleto findWithoutFail($id, $columns = ['*'])
 * @method boleto find($id, $columns = ['*'])
 * @method boleto first($columns = ['*'])
*/
class boletoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'codigo',
        'idvalor',
        'activo',
        'idevento',
        'iduser'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return boleto::class;
    }
}
