<?php

namespace App\Models;

use App\Rules\ScheduleDateRule;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class service_schedule
 * @package App\Models
 * @version January 18, 2022, 8:17 pm UTC
 *
 * @property integer $beneficiary_id
 * @property integer $service_provider_id
 * @property integer $branch_id
 * @property integer $service_type_id
 * @property integer $department_id
 * @property integer $room_id
 * @property string $date_time
 * @property integer $accounting_type
 * @property integer $base_fees
 * @property integer $extra_fees
 * @property string $extra_fees_note
 * @property integer $total_fees
 */
class ServiceSchedule extends Model
{
    use SoftDeletes;

    const REGULAR = 1;
    const URGENT = 2;
    const DISCOUNT = 3;
    const FREE = 4;

    const ONE_WEEK = 0;
    const TWO_WEEKS = 1;
    const THREE_WEEKS = 2;
    const ONE_MONTH = 3;

    public $table = 'service_schedule';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'beneficiary_id',
        'service_provider_id',
        'branch_id',
        'service_type_id',
        'department_id',
        'room_id',
        'date_time',
        'accounting_type',
        'base_fees',
        'extra_fees',
        'extra_fees_note',
        'total_fees'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'beneficiary_id' => 'integer',
        'service_provider_id' => 'integer',
        'branch_id' => 'integer',
        'service_type_id' => 'integer',
        'department_id' => 'integer',
        'room_id' => 'integer',
        'date_time' => 'date',
        'accounting_type' => 'integer',
        'base_fees' => 'integer',
        'extra_fees' => 'integer',
        'extra_fees_note' => 'string',
        'total_fees' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    // public static $rules = [
    //     'beneficiary_id' => 'required',
    //     'service_provider_id' => 'required',
    //     'branch_id' => 'required',
    //     'service_type_id' => 'required|not_in:0',
    //     'department_id' => 'required',
    //     'room_id' => 'required',
    //     // 'date_time' => ['required', 'string' , new ],
    //     'name' => ['required', 'string', new ScheduleDateRule],
    //     'accounting_type' => 'required',
    //     'base_fees' => 'required',
    //     // 'extra_fees' => 'required',
    //     // 'extra_fees_note' => 'required',
    //     'repeat' => 'required',
    //     'total_fees' => 'required'
    // ];

    static function accountingTypes()
    {
        return [
            self::REGULAR => 'Regular',
            self::URGENT => 'Urgent',
            self::DISCOUNT => 'Discount',
            self::FREE => 'Free',
        ];
    }

    static function scheduleRepeat()
    {
        return [
            self::ONE_WEEK => 'One Week',
            self::TWO_WEEKS => 'Two Weeks',
            self::THREE_WEEKS => 'Three Weeks',
            self::ONE_MONTH => 'One Month',
        ];
    }

    static function accountingTypesCoulmn()
    {
        return [
            self::REGULAR => 'Regular',
            self::URGENT => 'Urgent',
            self::DISCOUNT => 'Discount',
            self::FREE => 'Free',
        ];
    }

    public function getAccountingTypeLable()
    {
        switch ($this->accounting_type) {
            case self::REGULAR:
                return 'Regular';
                break;
            case self::URGENT:
                return 'Urgent';
                break;
            case self::DISCOUNT:
                return 'Discount';
                break;
            case self::FREE:
                return 'Free';
                break;
            default:
                return null;
                break;
        }
    }

    public function branch()
    {
        return $this->belongsTo(FirmBranch::class, 'branch_id', 'id');
    }
    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class, 'beneficiary_id', 'id');
    }
    public function service_provider()
    {
        return $this->belongsTo(ServiceProvider::class, 'service_provider_id', 'id');
    }
    public function service_type()
    {
        return $this->belongsTo(ServiceType::class, 'service_type_id', 'id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

}
