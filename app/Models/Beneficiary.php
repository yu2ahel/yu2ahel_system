<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class beneficiaries
 * @package App\Models
 * @version January 18, 2022, 7:07 pm UTC
 *
 * @property string $full_name
 * @property integer $type
 * @property string $date_of_birth
 * @property string $transferred_from
 * @property string $about
 * @property integer $degree
 * @property string $occupation
 */
class Beneficiary extends Model
{
    use SoftDeletes;

    const TYPE_TRAINING = 1;
    const TYPE_REHABILITATION = 2;

    public $table = 'beneficiaries';


    protected $dates = ['deleted_at'];
    protected $appends = ['status','registration_date','supervisor_id','branch_id','firm_id'];




    public $fillable = [
        'full_name',
        'type',
        'date_of_birth',
        'transferred_from',
        'about',
        'degree',
        'occupation'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'full_name' => 'string',
        'type' => 'integer',
        'date_of_birth' => 'date',
        'transferred_from' => 'string',
        'about' => 'string',
        'degree' => 'integer',
        'occupation' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'full_name' => 'required',
        'type' => 'required',
        'date_of_birth' => 'required',
        'transferred_from' => 'required',
        'about' => 'required',
        'degree' => 'required',
        'occupation' => 'required',
        'firm_id' => 'required',
        'branch_id' => 'required',
        'supervisor_id' => 'required',
        'registration_date' => 'required',
        'status' => 'required'
    ];

    static function getAllTypes()
    {
        return [
            self::TYPE_TRAINING => 'Training',
            self::TYPE_REHABILITATION => 'Rehabilitation',
        ];
    }

    public function getTypeLable()
    {
        switch ($this->type) {
            case self::TYPE_TRAINING:
                return 'Training';
                break;
            case self::TYPE_REHABILITATION:
                return 'Rehabilitation';
                break;
            default:
                return null;
                break;
        }
    }

    public function firmBeneficiary()
    {
        return $this->belongsTo(FirmBeneficiary::class, 'id', 'beneficiary_id');
    }

    public function getStatusAttribute()
    {
        return ($this->firmBeneficiary) ? $this->firmBeneficiary->status : null;
    }
    public function getRegistrationDateAttribute()
    {
        return ($this->firmBeneficiary) ? $this->firmBeneficiary->registration_date : null;
    }
    public function getSupervisorIdAttribute()
    {
        return ($this->firmBeneficiary) ? $this->firmBeneficiary->supervisor_id : null;
    }
    public function getBranchIdAttribute()
    {
        return ($this->firmBeneficiary) ? $this->firmBeneficiary->branch_id : null;
    }
    public function getFirmIdAttribute()
    {
        return ($this->firmBeneficiary) ? $this->firmBeneficiary->firm_id : null;
    }
}
