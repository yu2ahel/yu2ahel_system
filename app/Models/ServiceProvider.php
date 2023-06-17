<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class service_providers
 * @package App\Models
 * @version January 15, 2022, 4:56 pm UTC
 *
 * @property string $name
 * @property string $photo
 * @property string $id_number
 * @property integer $id_type
 * @property integer $gender
 * @property string $about
 * @property integer $user_type_id
 */
class ServiceProvider extends Model
{
    use SoftDeletes;

    const ID_TYPE_NATIONAL_ID = 1;
    const ID_TYPE_PASSPORT = 2;

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    public $table = 'service_providers';


    protected $dates = ['deleted_at'];
    protected $appends = ['services','job_title','basic_salary','default_services_percentage','date_of_registration','firm_id','user_type_id','email','password'
];



    public $fillable = [
        'name',
        'photo',
        'id_number',
        'id_type',
        'gender',
        'about',
        // 'user_type_id',
        'user_id'
        // 'job_title',
        // 'basic_salary',
        // 'default_services_percentage',
        // 'date_of_registration',
        // 'firm_id',
        // 'service_provider_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'photo' => 'string',
        'id_number' => 'string',
        'id_type' => 'integer',
        'gender' => 'integer',
        'user_id' => 'integer',
        'about' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'photo' => 'required',
        'id_number' => 'required',
        'id_type' => 'required',
        'gender' => 'required',
        'about' => 'required',
        'user_type_id' => 'required',
        'job_title' => 'required',
        'basic_salary' => 'required',
        'default_services_percentage' => ['required','max:2'],
        'date_of_registration' => 'required',
        'firm_id' => 'required',
        // 'user_id' => 'required',
        'email' => ['sometimes','required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
    ];
    // public function usertype()
    // {
    //     return $this->belongsTo(UserType::class, 'user_type_id', 'id');
    // }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    static function getAllStatus()
    {
        return [
            self::ID_TYPE_NATIONAL_ID => 'National ID',
            self::ID_TYPE_PASSPORT => 'Passport',
        ];
    }

    static function getAllGenders()
    {
        return [
            self::GENDER_MALE => 'Male',
            self::GENDER_FEMALE => 'Female',
        ];
    }

    public function getStatusLable()
    {
        switch ($this->id_type) {
            case self::ID_TYPE_NATIONAL_ID:
                return 'National ID';
                break;
            case self::ID_TYPE_PASSPORT:
                return 'Passport';
                break;
            default:
                return null;
                break;
        }
    }

    public function getGenderLable()
    {
        switch ($this->gender) {
            case self::GENDER_MALE:
                return 'Male';
                break;
            case self::GENDER_FEMALE:
                return 'Female';
                break;
            default:
                return null;
                break;
        }
    }
    public function getServicesAttribute()
    {
        return UserTypeService::where('user_type_id',$this->attributes['id'])->pluck('service_id')->toArray();
    }
    public function firmServiceProvidor()
    {
        return $this->belongsTo(FirmServiceProvider::class, 'id', 'service_provider_id');
    }

    public function getJobTitleAttribute()
    {
        return ($this->firmServiceProvidor) ? $this->firmServiceProvidor->job_title : null;
    }
    public function getBasicSalaryAttribute()
    {
        return ($this->firmServiceProvidor) ? $this->firmServiceProvidor->basic_salary : null;
    }
    public function getDefaultServicesPercentageAttribute()
    {
        return ($this->firmServiceProvidor) ? $this->firmServiceProvidor->default_services_percentage : null;
    }
    public function getDateOfRegistrationAttribute()
    {
        return ($this->firmServiceProvidor) ? $this->firmServiceProvidor->date_of_registration : null;
    }
    public function getFirmIdAttribute()
    {
        return ($this->firmServiceProvidor) ? $this->firmServiceProvidor->firm_id : null;
    }
    public function getUserTypeIdAttribute()
    {
        return ($this->firmServiceProvidor) ? $this->firmServiceProvidor->user_type_id : null;
    }
    public function getEmailAttribute()
    {
        return ($this->user) ? $this->user->email : null;
    }
    public function getPasswordAttribute()
    {
        return ($this->user) ? $this->user->password : null;
    }
    // public function FirmServiceProvider()
    // {
    //     return $this->belongsTo(FirmServiceProvider::class, 'service_provider_id');
    // }

}
