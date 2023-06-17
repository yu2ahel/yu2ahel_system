<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class services
 * @package App\Models
 * @version January 15, 2022, 12:44 pm UTC
 *
 * @property string $name
 * @property string $description
 * @property integer $percentage_discount_for_group_service
 * @property boolean $is_schedulable
 * @property boolean $is_plannable
 * @property boolean $is_attendable
 * @property integer $firm_id
 */
class Service extends Model
{
    use SoftDeletes;

    public $table = 'services';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'percentage_discount_for_group_service',
        'is_schedulable',
        'is_plannable',
        'is_attendable',
        'firm_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'percentage_discount_for_group_service' => 'integer',
        'is_schedulable' => 'boolean',
        'is_plannable' => 'boolean',
        'is_attendable' => 'boolean',
        'firm_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'firm_id' => 'required',
        'percentage_discount_for_group_service' => ['required','max:2']
    ];

    public function firm()
    {
        return $this->belongsTo(Firm::class, 'firm_id', 'id');
    }

}
