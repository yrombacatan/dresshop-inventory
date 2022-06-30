<?php

namespace App\Repositories;

use App\Models\Expense;
use App\Repositories\BaseRepository;

/**
 * Class ExpenseRepository
 * @package App\Repositories
 * @version June 20, 2021, 12:13 am UTC
*/

class ExpenseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'transac_date',
        'grand_total',
        'paid_amount',
        'expense_type_id'
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
        return Expense::class;
    }
}
