<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Product
 * @package App\Models
 * @version June 22, 2021, 2:21 am UTC
 *
 * @property \App\Models\ProductCategory $productCategory
 * @property \App\Models\Supplier $supplier
 * @property \App\Models\Warehouse $warehouse
 * @property string $name
 * @property string $mfg_date
 * @property string $exp_date
 * @property integer $quantity
 * @property integer $sell_price
 * @property integer $supplier_price
 * @property string $model
 * @property string $sku
 * @property string $img
 * @property string $description
 * @property integer $product_category_id
 * @property integer $supplier_id
 * @property integer $warehouse_id
 */
class Product extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'product';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'mfg_date',
        'exp_date',
        'quantity',
        'sell_price',
        'supplier_price',
        'model',
        'sku',
        'img',
        'description',
        'product_category_id',
        'supplier_id',
        'warehouse_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'mfg_date' => 'string',
        'exp_date' => 'string',
        'quantity' => 'integer',
        'sell_price' => 'integer',
        'supplier_price' => 'integer',
        'model' => 'string',
        'sku' => 'string',
        'img' => 'string',
        'description' => 'string',
        'product_category_id' => 'integer',
        'supplier_id' => 'integer',
        'warehouse_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:150',
        'mfg_date' => 'required|string|max:50',
        'exp_date' => 'required|string|max:50',
        'quantity' => 'required|integer',
        'sell_price' => 'required|integer',
        'supplier_price' => 'required|integer',
        'model' => 'required|string|max:100',
        'sku' => 'required|string|max:100',
        'img' => 'nullable|max:500|image',
        'description' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'product_category_id' => 'nullable',
        'supplier_id' => 'required',
        'warehouse_id' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function productCategory()
    {
        return $this->belongsTo(\App\Models\ProductCategory::class, 'product_category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function supplier()
    {
        return $this->belongsTo(\App\Models\Supplier::class, 'supplier_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function warehouse()
    {
        return $this->belongsTo(\App\Models\Warehouse::class, 'warehouse_id');
    }
}
