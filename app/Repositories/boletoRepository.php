<?php

namespace App\Repositories;

use App\Models\Boleto;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BoletoRepository
 * @package App\Repositories
 * @version October 26, 2018, 3:06 am UTC
 *
 * @method Boleto findWithoutFail($id, $columns = ['*'])
 * @method Boleto find($id, $columns = ['*'])
 * @method Boleto first($columns = ['*'])
*/
class BoletoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Boleto::class;
    }
}
