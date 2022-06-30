<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Supplier
 * @package App\Models
 * @version June 15, 2021, 1:12 am UTC
 *
 */
class Supplier extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'supplier';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'contact_person',
        'email',
        'phone',
        'address',
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
        'contact_person' => 'required|max:100',
        'email' => 'required|max:100|email',
        'phone' => 'required|max:50',
        'address' => 'required|max:100',
    ];

    
}
