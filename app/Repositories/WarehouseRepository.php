<?php

namespace App\Repositories;

use App\Models\Warehouse;
use App\Repositories\BaseRepository;

/**
 * Class WarehouseRepository
 * @package App\Repositories
 * @version June 22, 2021, 1:49 am UTC
*/

class WarehouseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'slug'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Warehouse::class;
    }
}
