<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class departments
 * @package App\Models
 * @version January 18, 2022, 12:56 pm UTC
 *
 * @property string $name
 * @property string $brief
 * @property string $description
 * @property string $photo
 * @property integer $firm_id
 * @property integer $supervisor_id
 */
class Department extends Model
{
    use SoftDeletes;

    public $table = 'departments';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'brief',
        'description',
        'photo',
        'firm_id',
        'supervisor_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'brief' => 'string',
        'description' => 'string',
        'photo' => 'string',
        'firm_id' => 'integer',
        'supervisor_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'brief' => 'required',
        'description' => 'required',
        'photo' => 'required',
        'firm_id' => 'required',
        'supervisor_id' => 'required'
    ];

    public function firm()
    {
        return $this->belongsTo(Firm::class, 'firm_id', 'id');
    }

    public function supervisor()
    {
        return $this->belongsTo(ServiceProvider::class, 'supervisor_id', 'id');
    }
    public function serviceType()
    {
        return $this->hasMany(ServiceType::class, 'department_id', 'id');
    }

}
