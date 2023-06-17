<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class user_type
 * @package App\Models
 * @version January 15, 2022, 4:30 pm UTC
 *
 * @property string $name
 * @property string $description
 * @property boolean $is_dashboard_accesable
 */
class UserType extends Model
{
    const MODELPATH = "App\\\Models\\\UserType";
    use SoftDeletes ,HasPermissions ,HasRoles;

    public $table = 'user_type';

    protected $guard_name = 'web';
    protected $dates = ['deleted_at'];
    protected $appends = ['services'];
    protected $morphClass = 'App\Models\UserType';



    public $fillable = [
        'name',
        'description',
        'is_dashboard_accesable',
        'user_group_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'is_dashboard_accesable' => 'boolean',
        'user_group_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'user_group_id' => 'required'
    ];

    public function user_group()
    {
        return $this->belongsTo(UserGroup::class, 'user_group_id', 'id');
    }

    public function getServicesAttribute()
    {
        return UserTypeService::where('user_type_id',$this->attributes['id'])->pluck('service_id')->toArray();
    }

    public function deletePermissions()
    {
        ModelHasPermission::where('model_id',$this->id)->where('model_type',self::MODELPATH)->delete();
    }

}
