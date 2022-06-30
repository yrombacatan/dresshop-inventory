<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Expense
 * @package App\Models
 * @version June 20, 2021, 12:13 am UTC
 *
 * @property \App\Models\ExpenseType $expenseType
 * @property \Illuminate\Database\Eloquent\Collection $expenseDetails
 * @property string $transac_date
 * @property integer $grand_total
 * @property integer $paid_amount
 * @property integer $expense_type_id
 */
class ExpenseDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'expense_details';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'item',
        'quantity',
        'rate',
        'total',
        'expense_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'item' => 'string',
        'quantity' => 'integer',
        'rate' => 'integer',
        'total' => 'integer',
        'expense_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];

}
