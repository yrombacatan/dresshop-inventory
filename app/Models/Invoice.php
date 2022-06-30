<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Invoice
 * @package App\Models
 * @version June 26, 2021, 11:59 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $invoiceDetails
 * @property integer $invoice_number
 * @property string $customer_name
 * @property string $transac_date
 * @property integer $total_discount
 * @property integer $grand_total
 * @property integer $amount_paid
 */
class Invoice extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'invoice';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'invoice_number',
        'customer_name',
        'transac_date',
        'total_discount',
        'grand_total',
        'amount_paid',
        'customer_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'invoice_number' => 'integer',
        'transac_date' => 'string',
        'total_discount' => 'integer',
        'grand_total' => 'integer',
        'amount_paid' => 'integer',
        'customer_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'invoice_number' => 'required|integer',
        'transac_date' => 'required|string|max:100',
        // 'total_discount' => 'required|integer',
        // 'grand_total' => 'required|integer',
        // 'amount_paid' => 'nullable|integer',
        'customer_id' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/

    public function customer() {
        return $this->belongsTo(\App\Models\Customer::class, 'customer_id');
    }

    public function invoiceDetails()
    {
        return $this->hasMany(\App\Models\InvoiceDetail::class, 'invoice_id');
    }

}
