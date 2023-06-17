<?php

namespace App\Http\Controllers;

use App\DataTables\service_provider_servicesDataTable;
use App\Http\Requests;
use App\Http\Requests\Createservice_provider_servicesRequest;
use App\Http\Requests\Updateservice_provider_servicesRequest;
use App\Repositories\service_provider_servicesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class service_provider_servicesController extends AppBaseController
{
    /** @var  service_provider_servicesRepository */
    private $serviceProviderServicesRepository;

    public function __construct(service_provider_servicesRepository $serviceProviderServicesRepo)
    {
        $this->serviceProviderServicesRepository = $serviceProviderServicesRepo;
    }

    /**
     * Display a listing of the service_provider_services.
     *
     * @param service_provider_servicesDataTable $serviceProviderServicesDataTable
     * @return Response
     */
    public function index(service_provider_servicesDataTable $serviceProviderServicesDataTable)
    {
        return $serviceProviderServicesDataTable->render('service_provider_services.index');
    }

    /**
     * Show the form for creating a new service_provider_services.
     *
     * @return Response
     */
    public function create()
    {
        return view('service_provider_services.create');
    }

    /**
     * Store a newly created service_provider_services in storage.
     *
     * @param Createservice_provider_servicesRequest $request
     *
     * @return Response
     */
    public function store(Createservice_provider_servicesRequest $request)
    {
        $input = $request->all();

        $serviceProviderServices = $this->serviceProviderServicesRepository->create($input);

        Flash::success('Service Provider Services saved successfully.');

        return redirect(route('serviceProviderServices.index'));
    }

    /**
     * Display the specified service_provider_services.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviceProviderServices = $this->serviceProviderServicesRepository->find($id);

        if (empty($serviceProviderServices)) {
            Flash::error('Service Provider Services not found');

            return redirect(route('serviceProviderServices.index'));
        }

        return view('service_provider_services.show')->with('serviceProviderServices', $serviceProviderServices);
    }

    /**
     * Show the form for editing the specified service_provider_services.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serviceProviderServices = $this->serviceProviderServicesRepository->find($id);

        if (empty($serviceProviderServices)) {
            Flash::error('Service Provider Services not found');

            return redirect(route('serviceProviderServices.index'));
        }

        return view('service_provider_services.edit')->with('serviceProviderServices', $serviceProviderServices);
    }

    /**
     * Update the specified service_provider_services in storage.
     *
     * @param  int              $id
     * @param Updateservice_provider_servicesRequest $request
     *
     * @return Response
     */
    public function update($id, Updateservice_provider_servicesRequest $request)
    {
        $serviceProviderServices = $this->serviceProviderServicesRepository->find($id);

        if (empty($serviceProviderServices)) {
            Flash::error('Service Provider Services not found');

            return redirect(route('serviceProviderServices.index'));
        }

        $serviceProviderServices = $this->serviceProviderServicesRepository->update($request->all(), $id);

        Flash::success('Service Provider Services updated successfully.');

        return redirect(route('serviceProviderServices.index'));
    }

    /**
     * Remove the specified service_provider_services from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviceProviderServices = $this->serviceProviderServicesRepository->find($id);

        if (empty($serviceProviderServices)) {
            Flash::error('Service Provider Services not found');

            return redirect(route('serviceProviderServices.index'));
        }

        $this->serviceProviderServicesRepository->delete($id);

        Flash::success('Service Provider Services deleted successfully.');

        return redirect(route('serviceProviderServices.index'));
    }
}
