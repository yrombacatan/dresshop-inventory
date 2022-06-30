<?php

namespace App\Repositories;

use App\Models\ExpenseType;
use App\Repositories\BaseRepository;

/**
 * Class ExpenseTypeRepository
 * @package App\Repositories
 * @version June 19, 2021, 11:06 pm UTC
*/

class ExpenseTypeRepository extends BaseRepository
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
        return ExpenseType::class;
    }
}
