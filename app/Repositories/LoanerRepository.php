<?php

namespace App\Repositories;

use App\Models\Loaner;
use App\Repositories\BaseRepository;

/**
 * Class LoanerRepository
 * @package App\Repositories
 * @version June 22, 2021, 11:59 am UTC
*/

class LoanerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'phone',
        'address'
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
        return Loaner::class;
    }
}
