<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ProductCategory
 * @package App\Models
 * @version June 14, 2021, 12:31 pm UTC
 *
 */
class ProductCategory extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'product_category';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name','slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:100',
        'slug' => 'required|max:100|unique:product_category'
    ];

    
}
