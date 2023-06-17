<?php

namespace App\Http\Controllers;

use App\DataTables\firm_branchesDataTable;
use App\Http\Requests;
use App\Http\Requests\Createfirm_branchesRequest;
use App\Http\Requests\Updatefirm_branchesRequest;
use App\Repositories\firm_branchesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class firm_branchesController extends AppBaseController
{
    /** @var  firm_branchesRepository */
    private $firmBranchesRepository;

    public function __construct(firm_branchesRepository $firmBranchesRepo)
    {
        $this->firmBranchesRepository = $firmBranchesRepo;
    }

    /**
     * Display a listing of the firm_branches.
     *
     * @param firm_branchesDataTable $firmBranchesDataTable
     * @return Response
     */
    public function index(firm_branchesDataTable $firmBranchesDataTable)
    {
        return $firmBranchesDataTable->render('firm_branches.index');
    }

    /**
     * Show the form for creating a new firm_branches.
     *
     * @return Response
     */
    public function create()
    {
        return view('firm_branches.create');
    }

    /**
     * Store a newly created firm_branches in storage.
     *
     * @param Createfirm_branchesRequest $request
     *
     * @return Response
     */
    public function store(Createfirm_branchesRequest $request)
    {
        $input = $request->all();

        $firmBranches = $this->firmBranchesRepository->create($input);

        Flash::success('Firm Branches saved successfully.');

        return redirect(route('firmBranches.index'));
    }

    /**
     * Display the specified firm_branches.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $firmBranches = $this->firmBranchesRepository->find($id);

        if (empty($firmBranches)) {
            Flash::error('Firm Branches not found');

            return redirect(route('firmBranches.index'));
        }

        return view('firm_branches.show')->with('firmBranches', $firmBranches);
    }

    /**
     * Show the form for editing the specified firm_branches.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $firmBranches = $this->firmBranchesRepository->find($id);

        if (empty($firmBranches)) {
            Flash::error('Firm Branches not found');

            return redirect(route('firmBranches.index'));
        }

        return view('firm_branches.edit')->with('firmBranches', $firmBranches);
    }

    /**
     * Update the specified firm_branches in storage.
     *
     * @param  int              $id
     * @param Updatefirm_branchesRequest $request
     *
     * @return Response
     */
    public function update($id, Updatefirm_branchesRequest $request)
    {
        $firmBranches = $this->firmBranchesRepository->find($id);

        if (empty($firmBranches)) {
            Flash::error('Firm Branches not found');

            return redirect(route('firmBranches.index'));
        }

        $firmBranches = $this->firmBranchesRepository->update($request->all(), $id);

        Flash::success('Firm Branches updated successfully.');

        return redirect(route('firmBranches.index'));
    }

    /**
     * Remove the specified firm_branches from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $firmBranches = $this->firmBranchesRepository->find($id);

        if (empty($firmBranches)) {
            Flash::error('Firm Branches not found');

            return redirect(route('firmBranches.index'));
        }

        $this->firmBranchesRepository->delete($id);

        Flash::success('Firm Branches deleted successfully.');

        return redirect(route('firmBranches.index'));
    }
}
