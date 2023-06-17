<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);
Route::group(['middleware' => ['verified']], function () {
    Route::resource('firmServiceProviders', 'firm_service_providersController')->middleware(['can:show providers']) ;

    Route::resource('departments', 'departmentsController')->middleware(['can:show department']);

    Route::resource('userGroups', 'user_groupController')->middleware(['can:show user group']);


    Route::resource('countries', 'countriesController')->middleware(['can:admin']);


    Route::resource('cities', 'citiesController')->middleware(['can:admin']);


    Route::resource('firms', 'firmsController')->middleware(['can:admin']);


    Route::resource('firmBranches', 'firm_branchesController')->middleware(['can:show branches']);

    Route::resource('services', 'servicesController')->middleware(['can:show service']);


    Route::resource('serviceTypes', 'service_typesController')->middleware(['can:show service']);


    Route::resource('rooms', 'roomsController')->middleware(['can:show rooms']);


    Route::resource('userTypes', 'user_typeController')->middleware(['can:show user type']);


    Route::resource('serviceProviders', 'service_providersController')->middleware(['can:show providers']);

    Route::resource('users', 'UserController')->middleware(['can:show users']);

    Route::resource('serviceProviderServices', 'service_provider_servicesController');


    Route::resource('beneficiaries', 'beneficiariesController');


    Route::resource('firmBeneficiaries', 'firm_beneficiariesController');


    Route::resource('caseDetails', 'case_detailsController');


    Route::resource('serviceSchedules', 'serviceScheduleController');

    Route::get('/home', 'HomeController@index');
    Route::get('/', 'HomeController@index');
    Route::get('user-type/layout', 'user_typeController@layout')->name('user-type/layout');
    Route::resource('beneficiaryAccountingRecords', 'beneficiary_accounting_recordsController');

    Route::get('locale/{locale}', function ($locale){
        Session::put('locale', $locale);
        return redirect()->back();
    });

    Route::get('get-service-types', 'serviceScheduleController@getServiceTypes');
    Route::get('get-service-price', 'serviceScheduleController@getServicePrice');
    Route::get('get-base-fees', 'serviceScheduleController@getBaseFees');

});













