<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class user_group
 * @package App\Models
 * @version January 13, 2022, 5:17 pm UTC
 *
 * @property string $name
 * @property string $description
 */
class UserGroup extends Model
{
    use SoftDeletes;

    public $table = 'user_groups';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'firm_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'firm_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'firm_id' => 'required'
    ];
    public function userTypes()
    {
        return $this->hasMany(UserType::class, 'user_group_id', 'id');
    }


}
