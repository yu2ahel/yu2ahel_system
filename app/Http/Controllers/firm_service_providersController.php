<?php

namespace App\Http\Controllers;

use App\DataTables\firm_service_providersDataTable;
use App\Http\Requests;
use App\Http\Requests\Createfirm_service_providersRequest;
use App\Http\Requests\Updatefirm_service_providersRequest;
use App\Repositories\firm_service_providersRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class firm_service_providersController extends AppBaseController
{
    /** @var  firm_service_providersRepository */
    private $firmServiceProvidersRepository;

    public function __construct(firm_service_providersRepository $firmServiceProvidersRepo)
    {
        $this->firmServiceProvidersRepository = $firmServiceProvidersRepo;
    }

    /**
     * Display a listing of the firm_service_providers.
     *
     * @param firm_service_providersDataTable $firmServiceProvidersDataTable
     * @return Response
     */
    public function index(firm_service_providersDataTable $firmServiceProvidersDataTable)
    {
        return $firmServiceProvidersDataTable->render('firm_service_providers.index');
    }

    /**
     * Show the form for creating a new firm_service_providers.
     *
     * @return Response
     */
    public function create()
    {
        return view('firm_service_providers.create');
    }

    /**
     * Store a newly created firm_service_providers in storage.
     *
     * @param Createfirm_service_providersRequest $request
     *
     * @return Response
     */
    public function store(Createfirm_service_providersRequest $request)
    {
        $input = $request->all();

        $firmServiceProviders = $this->firmServiceProvidersRepository->create($input);

        Flash::success('Firm Service Providers saved successfully.');

        return redirect(route('firmServiceProviders.index'));
    }

    /**
     * Display the specified firm_service_providers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $firmServiceProviders = $this->firmServiceProvidersRepository->find($id);

        if (empty($firmServiceProviders)) {
            Flash::error('Firm Service Providers not found');

            return redirect(route('firmServiceProviders.index'));
        }

        return view('firm_service_providers.show')->with('firmServiceProviders', $firmServiceProviders);
    }

    /**
     * Show the form for editing the specified firm_service_providers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $firmServiceProviders = $this->firmServiceProvidersRepository->find($id);

        if (empty($firmServiceProviders)) {
            Flash::error('Firm Service Providers not found');

            return redirect(route('firmServiceProviders.index'));
        }

        return view('firm_service_providers.edit')->with('firmServiceProviders', $firmServiceProviders);
    }

    /**
     * Update the specified firm_service_providers in storage.
     *
     * @param  int              $id
     * @param Updatefirm_service_providersRequest $request
     *
     * @return Response
     */
    public function update($id, Updatefirm_service_providersRequest $request)
    {
        $firmServiceProviders = $this->firmServiceProvidersRepository->find($id);

        if (empty($firmServiceProviders)) {
            Flash::error('Firm Service Providers not found');

            return redirect(route('firmServiceProviders.index'));
        }

        $firmServiceProviders = $this->firmServiceProvidersRepository->update($request->all(), $id);

        Flash::success('Firm Service Providers updated successfully.');

        return redirect(route('firmServiceProviders.index'));
    }

    /**
     * Remove the specified firm_service_providers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $firmServiceProviders = $this->firmServiceProvidersRepository->find($id);

        if (empty($firmServiceProviders)) {
            Flash::error('Firm Service Providers not found');

            return redirect(route('firmServiceProviders.index'));
        }

        $this->firmServiceProvidersRepository->delete($id);

        Flash::success('Firm Service Providers deleted successfully.');

        return redirect(route('firmServiceProviders.index'));
    }
}
