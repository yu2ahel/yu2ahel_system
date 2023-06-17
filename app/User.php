<?php

namespace App;

use App\Models\Beneficiary;
use App\Models\Department;
use App\Models\Firm;
use App\Models\FirmBranch;
use App\Models\Room;
use App\Models\Service;
use App\Models\ServiceProvider;
use App\Models\ServiceType;
use App\Models\UserGroup;
use App\Models\UserType;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable , HasRoles ;

    const TYPE_ADMIN = 1;
    const TYPE_FIRM_ADMIN = 2;
    const TYPE_FIRM_USER = 3;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['sometimes','required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'type' => ['required', 'integer', 'min:1', 'max:10'],
      ];

    static function availableUsers()
    {
        return self::leftJoin('service_providers', 'service_providers.user_id', '=', 'users.id')->leftJoin('firms', 'firms.user_id', '=', 'users.id')->whereNull('service_providers.user_id')->whereNull('firms.user_id')->pluck('users.name','users.id')->toArray();
    }

    static function availableFirmUser()
    {
        return self::leftJoin('service_providers', 'service_providers.user_id', '=', 'users.id')->whereNull('service_providers.user_id')->where('users.type',SELF::TYPE_FIRM_USER)->pluck('users.name','users.id')->toArray();
    }

    static function availableFirmAdmin()
    {
        return self::leftJoin('firms', 'firms.user_id', '=', 'users.id')->whereNull('firms.user_id')->where('users.type',SELF::TYPE_FIRM_USER)->pluck('users.name','users.id')->toArray();
    }

    // public function availableFirms()
    // {
    //     self::leftJoin('firms', 'firms.user_id', '=', 'users.id')->where(function ($query) {
    //         $query->whereNull('firms.user_id')
    //               ->orWhere('firms.user_id', '=', $this->user_id);
    //     })
    //     ->pluck('users.name','users.id')->toArray();
    // }
    static function getTypes()
    {
        $user = Auth::user();

        if ($user->type == self::TYPE_ADMIN) {
            return [
                self::TYPE_ADMIN => 'Admin',
                self::TYPE_FIRM_ADMIN =>'Firm Admin' ,
                self::TYPE_FIRM_USER =>'Firm User' ,
            ];
        }else {
            return [
                self::TYPE_FIRM_USER =>'Firm User' ,
            ];
        }
    }
    public function getType()
    {
        switch ($this->type) {
            case self::TYPE_ADMIN:
                return 'Admin';
                break;
            case self::TYPE_FIRM_ADMIN:
                return 'Firm Admin';
                break;
            case self::TYPE_FIRM_USER:
                return 'Firm User';
                break;
            default:
                return null;
                break;
        }
    }
    public function ServiceProvider()
    {
        return $this->hasOne(ServiceProvider::class, 'user_id');
    }

    public function permiisionsOwner($permission)
    {
        if($this->type == self::TYPE_FIRM_ADMIN){
            $role = $this->roles->first();
            return ($role !== null ? $role->hasPermissionTo($permission) : false );
        }else if ($this->type == self::TYPE_FIRM_USER) {
            // dd($this->ServiceProvider->firmServiceProvidor);
            if(isset($this->ServiceProvider) && isset($this->ServiceProvider->firmServiceProvidor)){
                // dd('asd');
                $usertype = $this->ServiceProvider->firmServiceProvidor->user_type;
                return ( $usertype !== null ? $usertype->hasPermissionTo($permission) : false );
            }else {
                return false ;
            }
        }elseif ($this->type == self::TYPE_ADMIN) {
            return true;
        }
    }
    public function firm()
    {
        if ($this->type == self::TYPE_FIRM_USER) {
            return $this->ServiceProvider->firmServiceProvidor->firm();
        }else {
            return $this->hasOne(Firm::class, 'user_id');
        }
    }

    public function userServices()
    {

        if ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER) && !empty(Auth::user()->firm) && Auth::user()->firm->services() ) {
            return  Auth::user()->firm->services()->get()->pluck('name','id')->toArray() ;
        }elseif (Auth::user()->type == User::TYPE_ADMIN) {
            return Service::pluck('name','id')->toArray();
        }else {
            return [];
        }
    }
    public function userDepartments()
    {

        if ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER) && !empty(Auth::user()->firm) && Auth::user()->firm->departments() ) {
            return  Auth::user()->firm->departments()->get()->pluck('name','id')->toArray() ;
        }elseif (Auth::user()->type == User::TYPE_ADMIN) {
            return Department::pluck('name','id')->toArray();
        }else {
            return [];
        }
    }
    public function userGroup()
    {

        if ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER) && !empty(Auth::user()->firm) && Auth::user()->firm->userGroups() ) {
            return  Auth::user()->firm->userGroups()->get()->pluck('name','id')->toArray() ;
        }elseif (Auth::user()->type == User::TYPE_ADMIN) {
            return UserGroup::pluck('name','id')->toArray();
        }else {
            return [];
        }
    }

    public function userUserType()
    {

        if ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER) && !empty(Auth::user()->firm) && Auth::user()->firm->userGroups() ) {
            return  UserType::leftJoin('user_groups', 'user_groups.id', '=', 'user_type.user_group_id')->where('user_groups.firm_id',Auth::user()->firm->id)->pluck('user_type.name','user_type.id')->toArray() ;
        }elseif (Auth::user()->type == User::TYPE_ADMIN) {
            return UserType::pluck('name','id')->toArray();
        }else {
            return [];
        }
    }
    public function userServiceTypes()
    {
        if ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER) && !empty(Auth::user()->firm) && !empty(Auth::user()->firm->department) && Auth::user()->firm->department->serviceType ) {
            return  Auth::user()->firm->department->serviceType()->get()->pluck('name','id')->toArray() ;
        }elseif (Auth::user()->type == User::TYPE_ADMIN) {
            return ServiceType::pluck('name','id')->toArray();
        }else {
            return [];
        }
    }
    public function userRooms()
    {
        if ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER) && !empty(Auth::user()->firm) && Auth::user()->firm->rooms() ) {
            return  Auth::user()->firm->rooms()->get()->pluck('room_name','id')->toArray() ;
        }elseif (Auth::user()->type == User::TYPE_ADMIN) {
            return Room::pluck('room_name','id')->toArray();
        }else {
            return [];
        }
    }
    public function userServiceProviders()
    {
        if ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER) && !empty(Auth::user()->firm) && Auth::user()->firm->providers() ) {
            return  Auth::user()->firm->providers->pluck('name','id')->toArray() ;
        }elseif (Auth::user()->type == User::TYPE_ADMIN) {
            return ServiceProvider::pluck('name','id')->toArray();
        }else {
            return [];
        }
    }
    public function userBeneficiaries()
    {
        if ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER) && !empty(Auth::user()->firm) && Auth::user()->firm->beneficiaries() ) {
            return  Auth::user()->firm->beneficiaries->pluck('full_name','id')->toArray() ;
        }elseif (Auth::user()->type == User::TYPE_ADMIN) {
            return Beneficiary::pluck('full_name','id')->toArray();
        }else {
            return [];
        }
    }

    public function userBranches()
    {
        if ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER) && !empty(Auth::user()->firm) && Auth::user()->firm->branches() ) {
            return  Auth::user()->firm->branches->pluck('name','id')->toArray() ;
        }elseif (Auth::user()->type == User::TYPE_ADMIN) {
            return FirmBranch::pluck('name','id')->toArray();
        }else {
            return [];
        }
    }
}
