<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class case_details
 * @package App\Models
 * @version January 18, 2022, 8:04 pm UTC
 *
 * @property integer $beneficiary_id
 * @property string $last_diagnosis
 * @property string $initial_diagnosis
 * @property integer $family_social_status
 * @property string $father_occupation
 * @property string $mother_occupation
 * @property  $escorter_name
 * @property string $notes
 */
class CaseDetail extends Model
{
    use SoftDeletes;

    public $table = 'case_details';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'beneficiary_id',
        'last_diagnosis',
        'initial_diagnosis',
        'family_social_status',
        'father_occupation',
        'mother_occupation',
        'escorter_name',
        'notes'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'beneficiary_id' => 'integer',
        'last_diagnosis' => 'string',
        'initial_diagnosis' => 'string',
        'family_social_status' => 'integer',
        'father_occupation' => 'string',
        'mother_occupation' => 'string',
        'notes' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'beneficiary_id' => 'required',
        'last_diagnosis' => 'required',
        'initial_diagnosis' => 'required',
        'family_social_status' => 'required',
        'father_occupation' => 'required',
        'mother_occupation' => 'required',
        'escorter_name' => 'required',
        'notes' => 'required'
    ];

}
