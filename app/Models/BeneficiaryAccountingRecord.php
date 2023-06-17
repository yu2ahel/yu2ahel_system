<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


/**
 * Class beneficiary_accounting_records
 * @package App\Models
 * @version January 18, 2022, 8:22 pm UTC
 *
 * @property integer $beneficiary_id
 * @property integer $transaction_type
 * @property integer $amount
 */
class BeneficiaryAccountingRecord extends Model
{
    use SoftDeletes;

    const DEPOSIT = 1;
    const WITHDRAW = 2;

    public $table = 'beneficiary_accounting_records';


    protected $dates = ['deleted_at'];

    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = is_object(Auth::guard(config('app.guards.web'))->user()) ? Auth::guard(config('app.guards.web'))->user()->id : 1;
            $model->updated_by = NULL;
        });

        static::updating(function ($model) {
            $model->updated_by = is_object(Auth::guard(config('app.guards.web'))->user()) ? Auth::guard(config('app.guards.web'))->user()->id : 1;
        });
    }


    public $fillable = [
        'beneficiary_id',
        'firm_id',
        'transaction_type',
        'amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'beneficiary_id' => 'integer',
        'firm_id' => 'integer',
        'transaction_type' => 'integer',
        'amount' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'beneficiary_id' => 'required',
        'firm_id' => 'required',
        'transaction_type' => 'required',
        'amount' => 'required'
    ];
    static function recordTypes()
    {
        return [
            self::DEPOSIT => 'deposit',
            self::WITHDRAW => 'withdraw',
        ];
    }

    public function getRecordTypeLable()
    {
        switch ($this->transaction_type) {
            case self::DEPOSIT:
                return 'deposit';
                break;
            case self::WITHDRAW:
                return 'withdraw';
                break;
            default:
                return null;
                break;
        }
    }

    public function beneficiary()
    {
        return $this->belongsTo(beneficiary::class, 'beneficiary_id', 'id');
    }

}
