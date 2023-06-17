<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class service_types
 * @package App\Models
 * @version January 15, 2022, 2:17 pm UTC
 *
 * @property string $name
 * @property integer $average_time_in_minutes
 * @property interger $default_price_regular
 * @property integer $default_price_urgent
 * @property integer $default_price_discount
 * @property integer $is_freeable
 * @property integer $service_id
 */
class ServiceType extends Model
{
    use SoftDeletes;

    public $table = 'service_types';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'average_time_in_minutes',
        'default_price_regular',
        'default_price_urgent',
        'default_price_discount',
        'is_freeable',
        'service_id',
        'department_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'average_time_in_minutes' => 'integer',
        'default_price_urgent' => 'integer',
        'default_price_discount' => 'integer',
        'is_freeable' => 'integer',
        'service_id' => 'integer',
        'department_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'average_time_in_minutes' => 'required',
        'default_price_regular' => 'required',
        'default_price_urgent' => 'required',
        'default_price_discount' => 'required',
        'service_id' => 'required',
        'department_id' => 'required',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    static function accountingTypesCoulmn($id)
    {
        switch ($id) {
            case ServiceSchedule::REGULAR:
                return 'default_price_regular';
                break;
            case ServiceSchedule::URGENT:
                return 'default_price_urgent';
                break;
            case ServiceSchedule::DISCOUNT:
                return 'default_price_discount';
                break;
            case ServiceSchedule::FREE:
                return 0;
                break;
            default:
                return null;
                break;
        }
    }

}
