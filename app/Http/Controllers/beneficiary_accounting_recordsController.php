<?php

namespace App\Http\Controllers;

use App\DataTables\beneficiary_accounting_recordsDataTable;
use App\Http\Requests;
use App\Http\Requests\Createbeneficiary_accounting_recordsRequest;
use App\Http\Requests\Updatebeneficiary_accounting_recordsRequest;
use App\Repositories\beneficiary_accounting_recordsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class beneficiary_accounting_recordsController extends AppBaseController
{
    /** @var  beneficiary_accounting_recordsRepository */
    private $beneficiaryAccountingRecordsRepository;

    public function __construct(beneficiary_accounting_recordsRepository $beneficiaryAccountingRecordsRepo)
    {
        $this->beneficiaryAccountingRecordsRepository = $beneficiaryAccountingRecordsRepo;
    }

    /**
     * Display a listing of the beneficiary_accounting_records.
     *
     * @param beneficiary_accounting_recordsDataTable $beneficiaryAccountingRecordsDataTable
     * @return Response
     */
    public function index(beneficiary_accounting_recordsDataTable $beneficiaryAccountingRecordsDataTable)
    {
        return $beneficiaryAccountingRecordsDataTable->render('beneficiary_accounting_records.index');
    }

    /**
     * Show the form for creating a new beneficiary_accounting_records.
     *
     * @return Response
     */
    public function create()
    {
        return view('beneficiary_accounting_records.create');
    }

    /**
     * Store a newly created beneficiary_accounting_records in storage.
     *
     * @param Createbeneficiary_accounting_recordsRequest $request
     *
     * @return Response
     */
    public function store(Createbeneficiary_accounting_recordsRequest $request)
    {
        $input = $request->all();

        $beneficiaryAccountingRecords = $this->beneficiaryAccountingRecordsRepository->create($input);

        Flash::success('Beneficiary Accounting Records saved successfully.');

        return redirect(route('beneficiaryAccountingRecords.index'));
    }

    /**
     * Display the specified beneficiary_accounting_records.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $beneficiaryAccountingRecords = $this->beneficiaryAccountingRecordsRepository->find($id);

        if (empty($beneficiaryAccountingRecords)) {
            Flash::error('Beneficiary Accounting Records not found');

            return redirect(route('beneficiaryAccountingRecords.index'));
        }

        return view('beneficiary_accounting_records.show')->with('beneficiaryAccountingRecords', $beneficiaryAccountingRecords);
    }

    /**
     * Show the form for editing the specified beneficiary_accounting_records.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $beneficiaryAccountingRecords = $this->beneficiaryAccountingRecordsRepository->find($id);

        if (empty($beneficiaryAccountingRecords)) {
            Flash::error('Beneficiary Accounting Records not found');

            return redirect(route('beneficiaryAccountingRecords.index'));
        }

        return view('beneficiary_accounting_records.edit')->with('beneficiaryAccountingRecords', $beneficiaryAccountingRecords);
    }

    /**
     * Update the specified beneficiary_accounting_records in storage.
     *
     * @param  int              $id
     * @param Updatebeneficiary_accounting_recordsRequest $request
     *
     * @return Response
     */
    public function update($id, Updatebeneficiary_accounting_recordsRequest $request)
    {
        $beneficiaryAccountingRecords = $this->beneficiaryAccountingRecordsRepository->find($id);

        if (empty($beneficiaryAccountingRecords)) {
            Flash::error('Beneficiary Accounting Records not found');

            return redirect(route('beneficiaryAccountingRecords.index'));
        }

        $beneficiaryAccountingRecords = $this->beneficiaryAccountingRecordsRepository->update($request->all(), $id);

        Flash::success('Beneficiary Accounting Records updated successfully.');

        return redirect(route('beneficiaryAccountingRecords.index'));
    }

    /**
     * Remove the specified beneficiary_accounting_records from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $beneficiaryAccountingRecords = $this->beneficiaryAccountingRecordsRepository->find($id);

        if (empty($beneficiaryAccountingRecords)) {
            Flash::error('Beneficiary Accounting Records not found');

            return redirect(route('beneficiaryAccountingRecords.index'));
        }

        $this->beneficiaryAccountingRecordsRepository->delete($id);

        Flash::success('Beneficiary Accounting Records deleted successfully.');

        return redirect(route('beneficiaryAccountingRecords.index'));
    }
}
