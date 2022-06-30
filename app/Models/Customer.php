<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Customer
 * @package App\Models
 * @version June 17, 2021, 6:49 am UTC
 *
 * @property string $fname
 * @property string $lname
 * @property string $mname
 * @property string $mobile
 * @property string $email
 * @property string $billing_address
 */
class Customer extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'customer';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'fname',
        'lname',
        'mname',
        'mobile',
        'email',
        'billing_address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fname' => 'string',
        'lname' => 'string',
        'mname' => 'string',
        'mobile' => 'string',
        'email' => 'string',
        'billing_address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fname' => 'required|string|max:100',
        'lname' => 'required|string|max:100',
        'mname' => 'required|string|max:100',
        'mobile' => 'required|string|max:50',
        'email' => 'required|string|max:50|email',
        'billing_address' => 'required|string|max:150',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function getFullNameAttribute()
    {
        return $this->fname .' '.$this->mname.' '.$this->lname;
    }
    
}
