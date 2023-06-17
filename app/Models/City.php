<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class cities
 * @package App\Models
 * @version January 13, 2022, 7:15 pm UTC
 *
 * @property string $en_name
 * @property string $ar_name
 * @property integer $country_id
 */
class City extends Model
{
    use SoftDeletes;

    public $table = 'cities';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'en_name',
        'ar_name',
        'country_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'en_name' => 'string',
        'ar_name' => 'string',
        'country_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'en_name' => 'required',
        'ar_name' => 'required',
        'country_id' => 'required'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

}
