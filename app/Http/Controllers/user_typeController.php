<?php

namespace App\Http\Controllers;

use App\DataTables\user_typeDataTable;
use App\Http\Requests;
use App\Http\Requests\Createuser_typeRequest;
use App\Http\Requests\Updateuser_typeRequest;
use App\Repositories\user_typeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\ModelHasPermission;
use App\Models\Permission;
use App\Models\Service;
use App\Models\UserType;
use App\Models\UserTypeService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Response;

class user_typeController extends AppBaseController
{
    /** @var  user_typeRepository */
    private $userTypeRepository;

    public function __construct(user_typeRepository $userTypeRepo)
    {
        $this->userTypeRepository = $userTypeRepo;
    }

    // public function handle($request, Closure $next, $permition)
    // {
    //     return redirect('/') ;
    // }
    /**
     * Display a listing of the user_type.
     *
     * @param user_typeDataTable $userTypeDataTable
     * @return Response
     */
    public function index(user_typeDataTable $userTypeDataTable)
    {
        return $userTypeDataTable->render('user_types.index');
    }

    /**
     * Show the form for creating a new user_type.
     *
     * @return Response
     */
    public function create()
    {
        // $services = Service::pluck('name','id')->toArray();
        $services = Auth::user()->userServices();

        $permissions  = Permission::pluck('name','name')->toArray();

        return view('user_types.create')->with('services', $services)->with('saved_service', null)->with('permissions',$permissions);
    }

    /**
     * Store a newly created user_type in storage.
     *
     * @param Createuser_typeRequest $request
     *
     * @return Response
     */
    public function store(Createuser_typeRequest $request)
    {
        $input = $request->all();

        $userType = $this->userTypeRepository->create($input);
        if(isset($input['services']))
        $this->addServices($userType->id ,$input['services']);

        if(!isset($input['is_dashboard_accesable']) || $input['is_dashboard_accesable'] == "0" )
        $input['permissions'] = [];

        if(isset($input['permissions']))
        $this->addPermissions($userType ,$input['permissions']);

        Flash::success('User Type saved successfully.');

        return redirect(route('userTypes.index'));
    }

    /**
     * Display the specified user_type.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userType = $this->userTypeRepository->find($id);

        if (empty($userType)) {
            Flash::error('User Type not found');

            return redirect(route('userTypes.index'));
        }

        return view('user_types.show')->with('userType', $userType);
    }

    /**
     * Show the form for editing the specified user_type.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userType = $this->userTypeRepository->find($id);

        if (empty($userType)) {
            Flash::error('User Type not found');

            return redirect(route('userTypes.index'));
        }
        $saved_service = UserTypeService::where('user_type_id',$userType->id)->pluck('service_id')->toArray();
        // $services = Service::pluck('name','id')->toArray();
        $services = Auth::user()->userServices();

        $saved_permissions = $userType->getPermissionNames()->toArray();
        $permissions  = Permission::pluck('name','name')->toArray();

        return view('user_types.edit')
        ->with('userType', $userType)
        ->with('saved_service', $saved_service)
        ->with('services', $services)
        ->with('permissions', $permissions)
        ->with('saved_permissions', $saved_permissions);
    }

    /**
     * Update the specified user_type in storage.
     *
     * @param  int              $id
     * @param Updateuser_typeRequest $request
     *
     * @return Response
     */
    public function update($id, Updateuser_typeRequest $request)
    {
        $userType = $this->userTypeRepository->find($id);

        if (empty($userType)) {
            Flash::error('User Type not found');

            return redirect(route('userTypes.index'));
        }
        $input = $request->all();
        $userType = $this->userTypeRepository->update($request->all(), $id);

        UserTypeService::where('user_type_id',$userType->id)->delete();
        if(isset($input['services']))
        $this->addServices($userType->id ,$input['services']);

        $deletepermissions = $userType->syncPermissions();
        if(!isset($input['is_dashboard_accesable']) || $input['is_dashboard_accesable'] == "0" )
        $input['permissions'] = [];

        if(isset($input['permissions']))
        $this->addPermissions($userType ,$input['permissions']);


        Flash::success('User Type updated successfully.');

        return redirect(route('userTypes.index'));
    }

    /**
     * Remove the specified user_type from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userType = $this->userTypeRepository->find($id);

        if (empty($userType)) {
            Flash::error('User Type not found');

            return redirect(route('userTypes.index'));
        }

        $this->userTypeRepository->delete($id);

        Flash::success('User Type deleted successfully.');

        return redirect(route('userTypes.index'));
    }

    public function addServices($id , array $services)
    {
        foreach ($services as $service) {
            $userTypeService = new UserTypeService;
            $userTypeService->user_type_id = $id ;
            $userTypeService->service_id = $service;
            $userTypeService->save();
        }
    }
    public function addPermissions(UserType $userType , array $permissions)
    {
        $userType->givePermissionTo($permissions);
    }

}
