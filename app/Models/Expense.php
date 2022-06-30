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
class Expense extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'expense';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'transac_date',
        'grand_total',
        'paid_amount',
        'expense_type_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'transac_date' => 'string',
        'grand_total' => 'integer',
        'paid_amount' => 'integer',
        'expense_type_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'transac_date' => 'required|string|max:255',
        'grand_total' => 'required|integer',
        'paid_amount' => 'nullable|integer',
        'expense_type_id' => 'required',
        'item' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function expenseType()
    {
        return $this->belongsTo(\App\Models\ExpenseType::class, 'expense_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function expenseDetails()
    {
        return $this->hasMany(\App\Models\ExpenseDetail::class, 'expense_id');
    }
}
