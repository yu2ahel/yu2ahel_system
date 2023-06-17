<?php

namespace App\Providers;

use App\Models\Beneficiary;
use App\Models\BeneficiaryAccountingRecord;
use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\FirmBranch;
use App\Models\Firm;
use App\Models\Room;
use App\Models\ServiceProvider as service_providers;
use App\Models\ServiceType;
use App\Models\Service;
use App\Models\ServiceSchedule;
use App\Models\UserGroup;
use App\Models\UserType;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['beneficiary_accounting_records.fields'], function ($view) {
            $beneficiaryItems = Beneficiary::pluck('full_name','id')->toArray();
            $view->with('beneficiaryItems', $beneficiaryItems);
        });
        View::composer(['service_schedules.fields'], function ($view) {
            $accountingTypes = ServiceSchedule::accountingTypes();;
            $view->with('accountingTypes', $accountingTypes);
        });
        View::composer(['service_schedules.fields'], function ($view) {
            $roomItems = Auth::user()->userRooms();
            $view->with('roomItems', $roomItems);
        });
        View::composer(['service_schedules.fields'], function ($view) {
            $departmentItems = Auth::user()->userDepartments();
            $view->with('departmentItems', $departmentItems);
        });
        View::composer(['service_schedules.fields'], function ($view) {
            $service_typeItems = Auth::user()->userServiceTypes();
            $view->with('service_typeItems', $service_typeItems);
        });
        View::composer(['service_schedules.fields'], function ($view) {
            $repeatItems = ServiceSchedule::scheduleRepeat();
            $view->with('repeatItems', $repeatItems);
        });
        View::composer(['service_schedules.fields'], function ($view) {
            $firm_branchItems = Auth::user()->userBranches();
            $view->with('firm_branchItems', $firm_branchItems);
        });
        View::composer(['service_schedules.fields'], function ($view) {
            $service_providerItems = Auth::user()->userServiceProviders();
            $view->with('service_providerItems', $service_providerItems);
        });
        View::composer(['service_schedules.fields'], function ($view) {
            $beneficiaryItems = Auth::user()->userBeneficiaries();
            $view->with('beneficiaryItems', $beneficiaryItems);
        });
        View::composer(['case_details.fields'], function ($view) {
            $beneficiaryItems = Beneficiary::pluck('full_name','id')->toArray();
            $view->with('beneficiaryItems', $beneficiaryItems);
        });
        View::composer(['firm_beneficiaries.fields'], function ($view) {
            $service_providerItems = service_providers::pluck('name','id')->toArray();
            $view->with('service_providerItems', $service_providerItems);
        });
        View::composer(['beneficiaries.fields'], function ($view) {
            $service_providerItems = Auth::user()->userServiceProviders();
            $view->with('service_providerItems', $service_providerItems);
        });
        View::composer(['firm_beneficiaries.fields'], function ($view) {
            $beneficiaryItems = Beneficiary::pluck('full_name','id')->toArray();
            $view->with('beneficiaryItems', $beneficiaryItems);
        });
        // View::composer(['beneficiaries.fields'], function ($view) {
        //     $beneficiaryItems = Beneficiary::pluck('full_name','id')->toArray();
        //     $view->with('beneficiaryItems', $beneficiaryItems);
        // });
        View::composer(['firm_beneficiaries.fields'], function ($view) {
            $firm_branchItems = FirmBranch::pluck('name','id')->toArray();
            $view->with('firm_branchItems', $firm_branchItems);
        });
        View::composer(['beneficiaries.fields'], function ($view) {
            $firm_branchItems = Auth::user()->userBranches();
            $view->with('firm_branchItems', $firm_branchItems);
        });
        View::composer(['firm_beneficiaries.fields'], function ($view) {
            $firmItems = Firm::pluck('ar_name','id')->toArray();
            $view->with('firmItems', $firmItems);
        });
        View::composer(['beneficiaries.fields'], function ($view) {
            $firmItems = Firm::pluck('ar_name','id')->toArray();
            $view->with('firmItems', $firmItems);
        });
        View::composer(['service_provider_services.fields'], function ($view) {
            $service_providerItems = Auth::user()->userServiceProviders();
            $view->with('service_providerItems', $service_providerItems);
        });
        View::composer(['service_provider_services.fields'], function ($view) {
            $service_typeItems = Auth::user()->userServiceTypes();
            // $service_typeItems = ServiceType::pluck('name','id')->toArray();
            $view->with('service_typeItems', $service_typeItems);
        });
        View::composer(['service_provider_services.fields'], function ($view) {
            $departmentItems = Department::pluck('name','id')->toArray();
            $view->with('departmentItems', $departmentItems);
        });
        View::composer(['service_provider_services.fields'], function ($view) {
            $firmItems = Firm::pluck('ar_name','id')->toArray();
            $view->with('firmItems', $firmItems);
        });
        View::composer(['firm_service_providers.fields'], function ($view) {
            $firmItems = Firm::pluck('ar_name','id')->toArray();
            $view->with('firmItems', $firmItems);
        });
        View::composer(['service_providers.fields'], function ($view) {
            $firmItems = Firm::pluck('ar_name','id')->toArray();
            $view->with('firmItems', $firmItems);
        });
        View::composer(['service_providers.fields'], function ($view) {
            $userTypeItems = Auth::user()->userUserType();
            $view->with('userTypeItems', $userTypeItems);
        });
        View::composer(['firm_service_providers.fields'], function ($view) {
            $providorItems = service_providers::pluck('name','id')->toArray();
            $view->with('providorItems', $providorItems);
        });
        View::composer(['user_types.fields'], function ($view) {
            $usergroupItems = Auth::user()->userGroup();
            $view->with('usergroupItems', $usergroupItems );
        });
        View::composer(['user_groups.fields'], function ($view) {
            $firmItems = Firm::pluck('ar_name','id')->toArray();
            $view->with('firmItems', $firmItems);
        });
        View::composer(['departments.fields'], function ($view) {
            $service_providerItems = Auth::user()->userServiceProviders();
            $view->with('service_providerItems', $service_providerItems);
        });
        View::composer(['departments.fields'], function ($view) {
            $firmItems = Firm::pluck('ar_name','id')->toArray();
            $view->with('firmItems', $firmItems);
        });
        View::composer(['service_providers.fields'], function ($view) {
            $userItems = User::availableFirmUser();
            $view->with('userItems', $userItems);
        });
        View::composer(['rooms.fields'], function ($view) {
            $firm_branchItems = Auth::user()->userBranches();
            $view->with('firm_branchItems', $firm_branchItems);
        });
        View::composer(['service_types.fields'], function ($view) {
            $serviceItems = Auth::user()->userServices();
            $view->with('serviceItems', $serviceItems);
        });
        View::composer(['service_types.fields'], function ($view) {
            $departmentItems = Auth::user()->userDepartments();
            $view->with('departmentItems', $departmentItems);
        });
        View::composer(['services.fields'], function ($view) {
            $firmItems = Firm::pluck('ar_name','id')->toArray();
            // array_unshift($firmItems ,null);
            // dd($firmItems);
            $view->with('firmItems', $firmItems);
        });
        View::composer(['services.fields'], function ($view) {
            $firmItems = Firm::pluck('ar_name')->toArray();
            $view->with('firmItems', $firmItems);
        });
        View::composer(['firm_branches.fields'], function ($view) {
            $firmItems = Firm::pluck('ar_name','id')->toArray();
            $view->with('firmItems', $firmItems);
        });
        View::composer(['beneficiary_accounting_records.fields'], function ($view) {
            $firmItems = Firm::pluck('ar_name','id')->toArray();
            $view->with('firmItems', $firmItems);
        });
        View::composer(['beneficiary_accounting_records.fields'], function ($view) {
            $transactionTypes = BeneficiaryAccountingRecord::recordTypes();;
            $view->with('transactionTypes', $transactionTypes);
        });

        View::composer(['firms.fields'], function ($view) {
            $cityItems = City::pluck('ar_name','id')->toArray();
            $view->with('cityItems', $cityItems);
        });
        // View::composer(['firms.fields'], function ($view) {
        //     $userItems = User::availableUsers();
        //     $view->with('userItems', $userItems);
        // });
        View::composer(['cities.fields'], function ($view) {
            $countryItems = Country::pluck('ar_name','id')->toArray();
            $view->with('countryItems', $countryItems);
        });
        View::composer(['users.fields'], function ($view) {
            $typeItems = User::getTypes();
            $view->with('typeItems', $typeItems);
        });
        //
    }
}
