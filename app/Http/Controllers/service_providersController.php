<?php

namespace App\Http\Controllers;

use App\DataTables\service_providersDataTable;
use App\Http\Requests;
use App\Http\Requests\Createservice_providersRequest;
use App\Http\Requests\Updateservice_providersRequest;
use App\Repositories\service_providersRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\FirmServiceProvider;
use Response;

class service_providersController extends AppBaseController
{
    /** @var  service_providersRepository */
    private $serviceProvidersRepository;

    public function __construct(service_providersRepository $serviceProvidersRepo)
    {
        $this->serviceProvidersRepository = $serviceProvidersRepo;
    }

    /**
     * Display a listing of the service_providers.
     *
     * @param service_providersDataTable $serviceProvidersDataTable
     * @return Response
     */
    public function index(service_providersDataTable $serviceProvidersDataTable)
    {
        return $serviceProvidersDataTable->render('service_providers.index');
    }

    /**
     * Show the form for creating a new service_providers.
     *
     * @return Response
     */
    public function create()
    {
        return view('service_providers.create');
    }

    /**
     * Store a newly created service_providers in storage.
     *
     * @param Createservice_providersRequest $request
     *
     * @return Response
     */
    public function store(Createservice_providersRequest $request)
    {
        $serviceProviders = $this->serviceProvidersRepository->createServiceProvidor($request);

        $serviceProviders = $this->serviceProvidersRepository->createFirmServiceProvidor($request,$serviceProviders);

        Flash::success('Service Providers saved successfully.');

        return redirect(route('serviceProviders.index'));
    }

    /**
     * Display the specified service_providers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviceProviders = $this->serviceProvidersRepository->find($id);

        if (empty($serviceProviders)) {
            Flash::error('Service Providers not found');

            return redirect(route('serviceProviders.index'));
        }

        return view('service_providers.show')->with('serviceProviders', $serviceProviders);
    }

    /**
     * Show the form for editing the specified service_providers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serviceProviders = $this->serviceProvidersRepository->find($id);

        if (empty($serviceProviders)) {
            Flash::error('Service Providers not found');

            return redirect(route('serviceProviders.index'));
        }

        return view('service_providers.edit')->with('serviceProviders', $serviceProviders);
    }

    /**
     * Update the specified service_providers in storage.
     *
     * @param  int              $id
     * @param Updateservice_providersRequest $request
     *
     * @return Response
     */
    public function update($id, Updateservice_providersRequest $request)
    {
        $serviceProviders = $this->serviceProvidersRepository->find($id);

        if (empty($serviceProviders)) {
            Flash::error('Service Providers not found');

            return redirect(route('serviceProviders.index'));
        }

        $user = $this->serviceProvidersRepository->updateUser($request , $id);
        $input = $this->serviceProvidersRepository->updateImage($request);
        $serviceProviders = $this->serviceProvidersRepository->update($input, $id);
        $firmserviceProviders = $this->serviceProvidersRepository->updateFirmServiceProvidor($request, $id);

        Flash::success('Service Providers updated successfully.');

        return redirect(route('serviceProviders.index'));
    }

    /**
     * Remove the specified service_providers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviceProviders = $this->serviceProvidersRepository->find($id);

        if (empty($serviceProviders)) {
            Flash::error('Service Providers not found');

            return redirect(route('serviceProviders.index'));
        }

        $this->serviceProvidersRepository->delete($id);
        $firmserviceprovider = FirmServiceProvider::where('service_provider_id',$id)->delete();

        Flash::success('Service Providers deleted successfully.');

        return redirect(route('serviceProviders.index'));
    }
}
