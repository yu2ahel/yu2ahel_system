<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class rooms
 * @package App\Models
 * @version January 15, 2022, 3:40 pm UTC
 *
 * @property string $room_name
 * @property integer $room_capacity
 * @property integer $branch_id
 */
class Room extends Model
{
    use SoftDeletes;

    public $table = 'rooms';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'room_name',
        'room_capacity',
        'branch_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'room_name' => 'string',
        'room_capacity' => 'integer',
        'branch_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'room_name' => 'required',
        'room_capacity' => 'required',
        'branch_id' => 'required'
    ];

    public function branch()
    {
        return $this->belongsTo(FirmBranch::class, 'branch_id', 'id');
    }

}
