<?php

namespace App\Http\Controllers;

use App\DataTables\service_typesDataTable;
use App\Http\Requests;
use App\Http\Requests\Createservice_typesRequest;
use App\Http\Requests\Updateservice_typesRequest;
use App\Repositories\service_typesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class service_typesController extends AppBaseController
{
    /** @var  service_typesRepository */
    private $serviceTypesRepository;

    public function __construct(service_typesRepository $serviceTypesRepo)
    {
        $this->serviceTypesRepository = $serviceTypesRepo;
    }

    /**
     * Display a listing of the service_types.
     *
     * @param service_typesDataTable $serviceTypesDataTable
     * @return Response
     */
    public function index(service_typesDataTable $serviceTypesDataTable)
    {
        return $serviceTypesDataTable->render('service_types.index');
    }

    /**
     * Show the form for creating a new service_types.
     *
     * @return Response
     */
    public function create()
    {
        return view('service_types.create');
    }

    /**
     * Store a newly created service_types in storage.
     *
     * @param Createservice_typesRequest $request
     *
     * @return Response
     */
    public function store(Createservice_typesRequest $request)
    {
        $input = $request->all();

        $serviceTypes = $this->serviceTypesRepository->create($input);

        Flash::success('Service Types saved successfully.');

        return redirect(route('serviceTypes.index'));
    }

    /**
     * Display the specified service_types.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviceTypes = $this->serviceTypesRepository->find($id);

        if (empty($serviceTypes)) {
            Flash::error('Service Types not found');

            return redirect(route('serviceTypes.index'));
        }

        return view('service_types.show')->with('serviceTypes', $serviceTypes);
    }

    /**
     * Show the form for editing the specified service_types.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serviceTypes = $this->serviceTypesRepository->find($id);

        if (empty($serviceTypes)) {
            Flash::error('Service Types not found');

            return redirect(route('serviceTypes.index'));
        }

        return view('service_types.edit')->with('serviceTypes', $serviceTypes);
    }

    /**
     * Update the specified service_types in storage.
     *
     * @param  int              $id
     * @param Updateservice_typesRequest $request
     *
     * @return Response
     */
    public function update($id, Updateservice_typesRequest $request)
    {
        $serviceTypes = $this->serviceTypesRepository->find($id);

        if (empty($serviceTypes)) {
            Flash::error('Service Types not found');

            return redirect(route('serviceTypes.index'));
        }

        $serviceTypes = $this->serviceTypesRepository->update($request->all(), $id);

        Flash::success('Service Types updated successfully.');

        return redirect(route('serviceTypes.index'));
    }

    /**
     * Remove the specified service_types from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviceTypes = $this->serviceTypesRepository->find($id);

        if (empty($serviceTypes)) {
            Flash::error('Service Types not found');

            return redirect(route('serviceTypes.index'));
        }

        $this->serviceTypesRepository->delete($id);

        Flash::success('Service Types deleted successfully.');

        return redirect(route('serviceTypes.index'));
    }
}
