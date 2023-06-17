<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class service_provider_services
 * @package App\Models
 * @version January 18, 2022, 5:52 pm UTC
 *
 * @property integer $firm_id
 * @property integer $department_id
 * @property integer $service_type_id
 * @property integer $service_provider_id
 * @property integer $service_provider_percentage
 * @property integer $price_regular
 * @property integer $price_urgent
 * @property integer $price_discount
 * @property boolean $is_free_accepted
 */
class ServiceProviderService extends Model
{
    use SoftDeletes;

    public $table = 'service_provider_services';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'firm_id',
        'service_type_id',
        'service_provider_id',
        'service_provider_percentage',
        'price_regular',
        'price_urgent',
        'price_discount',
        'is_free_accepted'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'firm_id' => 'integer',
        'service_type_id' => 'integer',
        'service_provider_id' => 'integer',
        'service_provider_percentage' => 'integer',
        'price_regular' => 'integer',
        'price_urgent' => 'integer',
        'price_discount' => 'integer',
        'is_free_accepted' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'firm_id' => 'required',
        'service_type_id' => 'required',
        'service_provider_id' => 'required',
        'service_provider_percentage' => ['required','max:2'],
        'price_regular' => 'required',
        'price_urgent' => 'required',
        'price_discount' => 'required'
    ];

    public function firm()
    {
        return $this->belongsTo(Firm::class, 'firm_id', 'id');
    }

    public function supervisor()
    {
        return $this->belongsTo(ServiceProvider::class, 'service_provider_id', 'id');
    }

    public function servicetype()
    {
        return $this->belongsTo(ServiceType::class, 'service_type_id', 'id');
    }
}
