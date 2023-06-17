<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class firm_beneficiaries
 * @package App\Models
 * @version January 18, 2022, 7:45 pm UTC
 *
 * @property integer $firm_id
 * @property integer $branch_id
 * @property integer $beneficiary_id
 * @property integer $supervisor_id
 * @property string $registration_date
 * @property integer $status
 */
class FirmBeneficiary extends Model
{
    use SoftDeletes;

    public $table = 'firm_beneficiaries';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'firm_id',
        'branch_id',
        'beneficiary_id',
        'supervisor_id',
        'registration_date',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'firm_id' => 'integer',
        'branch_id' => 'integer',
        'beneficiary_id' => 'integer',
        'supervisor_id' => 'integer',
        'registration_date' => 'date',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'firm_id' => 'required',
        'branch_id' => 'required',
        'beneficiary_id' => 'required',
        'supervisor_id' => 'required',
        'registration_date' => 'required',
        'status' => 'required'
    ];


}
