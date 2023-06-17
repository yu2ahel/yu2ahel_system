<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class firms
 * @package App\Models
 * @version January 13, 2022, 10:55 pm UTC
 *
 * @property string $en_name
 * @property string $ar_name
 * @property string $ar_about_firm
 * @property string $en_about_firm
 * @property string $date_of_establishment
 * @property string $tax_register_no
 * @property string $commercial_register_no
 * @property string $firm_classification
 * @property string $main_branch_address
 * @property integer $main_branch_city_id
 */
class Firm extends Model
{
    use SoftDeletes;

    public $table = 'firms';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'en_name',
        'ar_name',
        'ar_about_firm',
        'en_about_firm',
        'date_of_establishment',
        'tax_register_no',
        'commercial_register_no',
        'firm_classification',
        'main_branch_address',
        'main_branch_city_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'en_name' => 'string',
        'ar_name' => 'string',
        'ar_about_firm' => 'string',
        'en_about_firm' => 'string',
        'date_of_establishment' => 'date',
        'tax_register_no' => 'string',
        'commercial_register_no' => 'string',
        'firm_classification' => 'string',
        'main_branch_address' => 'string',
        'main_branch_city_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'en_name' => 'required',
        'ar_name' => 'required',
        'date_of_establishment' => 'required',
        'tax_register_no' => 'required',
        'commercial_register_no' => 'required',
        'firm_classification' => 'required',
        'main_branch_address' => 'required',
        'user_id' => ['required' , 'unique:firms'],
        'main_branch_city_id' => 'required'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'main_branch_city_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'firm_id', 'id');
    }

    public function departments()
    {
        return $this->hasMany(Department::class, 'firm_id', 'id');
    }
    public function branches()
    {
        return $this->hasMany(FirmBranch::class, 'firm_id', 'id');
    }
    public function providers()
    {
        return $this->belongsToMany(ServiceProvider::class, 'firm_service_providers', 'firm_id', 'service_provider_id');
    }
    public function rooms()
    {
        return $this->hasManyThrough(
            Room::class,
            FirmBranch::class,
            'firm_id',
            'branch_id',
            'id',
            'id'
        );
    }
    public function userGroups()
    {
        return $this->hasMany(UserGroup::class, 'firm_id', 'id');
    }

    public function beneficiaries()
    {
        return $this->belongsToMany(Beneficiary::class, 'firm_beneficiaries', 'firm_id', 'beneficiary_id');
    }

    public function department()
    {
        return $this->hasOne(Department::class, 'firm_id', 'id');
    }
    public function availableFirms()
    {
        $users =  user::leftJoin('firms', 'firms.user_id', '=', 'users.id')->where(function ($query) {
            $query->whereNull('firms.user_id')
                  ->orWhere('firms.user_id', '=', $this->user_id);
        })->where('users.type',User::TYPE_FIRM_ADMIN)
        ->pluck('users.name','users.id')->toArray();
        return ($users) ?? null ;
    }

}
