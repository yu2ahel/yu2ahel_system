<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class firm_branches
 * @package App\Models
 * @version January 13, 2022, 11:20 pm UTC
 *
 * @property string $name
 * @property integer $working_hours
 * @property integer $firm_id
 */
class FirmBranch extends Model
{
    use SoftDeletes;

    public $table = 'firm_branches';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'working_hours',
        'firm_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'working_hours' => 'integer',
        'firm_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'working_hours' => 'required',
        'firm_id' => 'required'
    ];

    public function firm()
    {
        return $this->belongsTo(Firm::class, 'firm_id', 'id');
    }


}
