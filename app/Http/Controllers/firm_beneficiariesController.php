<?php

namespace App\Http\Controllers;

use App\DataTables\firm_beneficiariesDataTable;
use App\Http\Requests;
use App\Http\Requests\Createfirm_beneficiariesRequest;
use App\Http\Requests\Updatefirm_beneficiariesRequest;
use App\Repositories\firm_beneficiariesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class firm_beneficiariesController extends AppBaseController
{
    /** @var  firm_beneficiariesRepository */
    private $firmBeneficiariesRepository;

    public function __construct(firm_beneficiariesRepository $firmBeneficiariesRepo)
    {
        $this->firmBeneficiariesRepository = $firmBeneficiariesRepo;
    }

    /**
     * Display a listing of the firm_beneficiaries.
     *
     * @param firm_beneficiariesDataTable $firmBeneficiariesDataTable
     * @return Response
     */
    public function index(firm_beneficiariesDataTable $firmBeneficiariesDataTable)
    {
        return $firmBeneficiariesDataTable->render('firm_beneficiaries.index');
    }

    /**
     * Show the form for creating a new firm_beneficiaries.
     *
     * @return Response
     */
    public function create()
    {
        return view('firm_beneficiaries.create');
    }

    /**
     * Store a newly created firm_beneficiaries in storage.
     *
     * @param Createfirm_beneficiariesRequest $request
     *
     * @return Response
     */
    public function store(Createfirm_beneficiariesRequest $request)
    {
        $input = $request->all();

        $firmBeneficiaries = $this->firmBeneficiariesRepository->create($input);

        Flash::success('Firm Beneficiaries saved successfully.');

        return redirect(route('firmBeneficiaries.index'));
    }

    /**
     * Display the specified firm_beneficiaries.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $firmBeneficiaries = $this->firmBeneficiariesRepository->find($id);

        if (empty($firmBeneficiaries)) {
            Flash::error('Firm Beneficiaries not found');

            return redirect(route('firmBeneficiaries.index'));
        }

        return view('firm_beneficiaries.show')->with('firmBeneficiaries', $firmBeneficiaries);
    }

    /**
     * Show the form for editing the specified firm_beneficiaries.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $firmBeneficiaries = $this->firmBeneficiariesRepository->find($id);

        if (empty($firmBeneficiaries)) {
            Flash::error('Firm Beneficiaries not found');

            return redirect(route('firmBeneficiaries.index'));
        }

        return view('firm_beneficiaries.edit')->with('firmBeneficiaries', $firmBeneficiaries);
    }

    /**
     * Update the specified firm_beneficiaries in storage.
     *
     * @param  int              $id
     * @param Updatefirm_beneficiariesRequest $request
     *
     * @return Response
     */
    public function update($id, Updatefirm_beneficiariesRequest $request)
    {
        $firmBeneficiaries = $this->firmBeneficiariesRepository->find($id);

        if (empty($firmBeneficiaries)) {
            Flash::error('Firm Beneficiaries not found');

            return redirect(route('firmBeneficiaries.index'));
        }

        $firmBeneficiaries = $this->firmBeneficiariesRepository->update($request->all(), $id);

        Flash::success('Firm Beneficiaries updated successfully.');

        return redirect(route('firmBeneficiaries.index'));
    }

    /**
     * Remove the specified firm_beneficiaries from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $firmBeneficiaries = $this->firmBeneficiariesRepository->find($id);

        if (empty($firmBeneficiaries)) {
            Flash::error('Firm Beneficiaries not found');

            return redirect(route('firmBeneficiaries.index'));
        }

        $this->firmBeneficiariesRepository->delete($id);

        Flash::success('Firm Beneficiaries deleted successfully.');

        return redirect(route('firmBeneficiaries.index'));
    }
}
