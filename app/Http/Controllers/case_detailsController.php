<?php

namespace App\Http\Controllers;

use App\DataTables\case_detailsDataTable;
use App\Http\Requests;
use App\Http\Requests\Createcase_detailsRequest;
use App\Http\Requests\Updatecase_detailsRequest;
use App\Repositories\case_detailsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class case_detailsController extends AppBaseController
{
    /** @var  case_detailsRepository */
    private $caseDetailsRepository;

    public function __construct(case_detailsRepository $caseDetailsRepo)
    {
        $this->caseDetailsRepository = $caseDetailsRepo;
    }

    /**
     * Display a listing of the case_details.
     *
     * @param case_detailsDataTable $caseDetailsDataTable
     * @return Response
     */
    public function index(case_detailsDataTable $caseDetailsDataTable)
    {
        return $caseDetailsDataTable->render('case_details.index');
    }

    /**
     * Show the form for creating a new case_details.
     *
     * @return Response
     */
    public function create()
    {
        return view('case_details.create');
    }

    /**
     * Store a newly created case_details in storage.
     *
     * @param Createcase_detailsRequest $request
     *
     * @return Response
     */
    public function store(Createcase_detailsRequest $request)
    {
        $input = $request->all();

        $caseDetails = $this->caseDetailsRepository->create($input);

        Flash::success('Case Details saved successfully.');

        return redirect(route('caseDetails.index'));
    }

    /**
     * Display the specified case_details.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $caseDetails = $this->caseDetailsRepository->find($id);

        if (empty($caseDetails)) {
            Flash::error('Case Details not found');

            return redirect(route('caseDetails.index'));
        }

        return view('case_details.show')->with('caseDetails', $caseDetails);
    }

    /**
     * Show the form for editing the specified case_details.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $caseDetails = $this->caseDetailsRepository->find($id);

        if (empty($caseDetails)) {
            Flash::error('Case Details not found');

            return redirect(route('caseDetails.index'));
        }

        return view('case_details.edit')->with('caseDetails', $caseDetails);
    }

    /**
     * Update the specified case_details in storage.
     *
     * @param  int              $id
     * @param Updatecase_detailsRequest $request
     *
     * @return Response
     */
    public function update($id, Updatecase_detailsRequest $request)
    {
        $caseDetails = $this->caseDetailsRepository->find($id);

        if (empty($caseDetails)) {
            Flash::error('Case Details not found');

            return redirect(route('caseDetails.index'));
        }

        $caseDetails = $this->caseDetailsRepository->update($request->all(), $id);

        Flash::success('Case Details updated successfully.');

        return redirect(route('caseDetails.index'));
    }

    /**
     * Remove the specified case_details from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $caseDetails = $this->caseDetailsRepository->find($id);

        if (empty($caseDetails)) {
            Flash::error('Case Details not found');

            return redirect(route('caseDetails.index'));
        }

        $this->caseDetailsRepository->delete($id);

        Flash::success('Case Details deleted successfully.');

        return redirect(route('caseDetails.index'));
    }
}
