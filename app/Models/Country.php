<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class countries
 * @package App\Models
 * @version January 13, 2022, 7:02 pm UTC
 *
 * @property string $en_name
 * @property string $ar_name
 * @property integer $time_zone
 */
class Country extends Model
{
    use SoftDeletes;

    public $table = 'countries';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'en_name',
        'ar_name',
        'time_zone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'en_name' => 'string',
        'ar_name' => 'string',
        'time_zone' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'en_name' => 'required',
        'ar_name' => 'required',
        'time_zone' => 'required'
    ];


}
