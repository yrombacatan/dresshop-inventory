<?php

namespace App\Models;

use Eloquent as Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Company
 * @package App\Models
 * @version June 15, 2021, 2:56 am UTC
 *
 * @property string $name
 * @property string $logo
 * @property string $address
 * @property string $city
 * @property string $country
 * @property string $phone
 * @property string $fax
 * @property string $website
 */
class Company extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'company';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    //protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'logo',
        'address',
        'city',
        'country',
        'phone',
        'fax',
        'website'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'logo' => 'string',
        'address' => 'string',
        'city' => 'string',
        'country' => 'string',
        'phone' => 'string',
        'fax' => 'string',
        'website' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:100',
        'logo' => 'required|image|max:150',
        'address' => 'required|string|max:100',
        'city' => 'required|string|max:50',
        'country' => 'required|string|max:50',
        'phone' => 'required|string|max:50',
        'fax' => 'required|string|max:70',
        'website' => 'required|string|max:50',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
