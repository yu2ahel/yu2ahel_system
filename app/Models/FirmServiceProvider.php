<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class firm_service_providers
 * @package App\Models
 * @version January 18, 2022, 1:40 pm UTC
 *
 * @property string $job_title
 * @property integer $basic_salary
 * @property integer $default_services_percentage
 * @property string $date_of_registration
 * @property integer $firm_id
 */
class FirmServiceProvider extends Model
{
    use SoftDeletes;

    public $table = 'firm_service_providers';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'job_title',
        'basic_salary',
        'default_services_percentage',
        'date_of_registration',
        'firm_id',
        'user_type_id',
        'service_provider_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'job_title' => 'string',
        'basic_salary' => 'integer',
        'default_services_percentage' => 'integer',
        'date_of_registration' => 'date',
        'service_provider_id' => 'integer',
        'user_type_id' => 'integer',
        'firm_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'job_title' => 'required',
        'basic_salary' => 'required',
        'default_services_percentage' => ['required','max:2'],
        'date_of_registration' => 'required',
        'firm_id' => 'required',
        'service_provider_id' => 'required',
        'user_type_id' => 'required'
    ];

    public function firm()
    {
        return $this->hasOne(Firm::class, 'id','firm_id');
    }
    public function user_type()
    {
        return $this->belongsTo(userType::class, 'user_type_id', 'id');
    }

    public function service_providor()
    {
        return $this->belongsTo(ServiceProvider::class, 'service_provider_id', 'id');
    }

}
