<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTypeService extends Model
{
    use SoftDeletes;

    public $table = 'user_type_services';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'user_type_id',
        'service_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_type_id' => 'integer',
        'service_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_type_id' => 'required',
        'service_id' => 'required',
    ];


}
