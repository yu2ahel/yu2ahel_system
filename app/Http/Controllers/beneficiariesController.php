<?php

namespace App\Http\Controllers;

use App\DataTables\beneficiariesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatebeneficiariesRequest;
use App\Http\Requests\UpdatebeneficiariesRequest;
use App\Repositories\beneficiariesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\FirmBeneficiary;
use Response;

class beneficiariesController extends AppBaseController
{
    /** @var  beneficiariesRepository */
    private $beneficiariesRepository;

    public function __construct(beneficiariesRepository $beneficiariesRepo)
    {
        $this->beneficiariesRepository = $beneficiariesRepo;
    }

    /**
     * Display a listing of the beneficiaries.
     *
     * @param beneficiariesDataTable $beneficiariesDataTable
     * @return Response
     */
    public function index(beneficiariesDataTable $beneficiariesDataTable)
    {
        return $beneficiariesDataTable->render('beneficiaries.index');
    }

    /**
     * Show the form for creating a new beneficiaries.
     *
     * @return Response
     */
    public function create()
    {
        return view('beneficiaries.create');
    }

    /**
     * Store a newly created beneficiaries in storage.
     *
     * @param CreatebeneficiariesRequest $request
     *
     * @return Response
     */
    public function store(CreatebeneficiariesRequest $request)
    {
        $input = $request->all();

        $beneficiaries = $this->beneficiariesRepository->create($input);
        $firmbeneficiaries = $this->beneficiariesRepository->createFirmBeneficiary($request,$beneficiaries);


        Flash::success('Beneficiaries saved successfully.');

        return redirect(route('beneficiaries.index'));
    }

    /**
     * Display the specified beneficiaries.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $beneficiaries = $this->beneficiariesRepository->find($id);

        if (empty($beneficiaries)) {
            Flash::error('Beneficiaries not found');

            return redirect(route('beneficiaries.index'));
        }

        return view('beneficiaries.show')->with('beneficiaries', $beneficiaries);
    }

    /**
     * Show the form for editing the specified beneficiaries.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $beneficiaries = $this->beneficiariesRepository->find($id);

        if (empty($beneficiaries)) {
            Flash::error('Beneficiaries not found');

            return redirect(route('beneficiaries.index'));
        }

        return view('beneficiaries.edit')->with('beneficiaries', $beneficiaries);
    }

    /**
     * Update the specified beneficiaries in storage.
     *
     * @param  int              $id
     * @param UpdatebeneficiariesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebeneficiariesRequest $request)
    {
        $beneficiaries = $this->beneficiariesRepository->find($id);

        if (empty($beneficiaries)) {
            Flash::error('Beneficiaries not found');

            return redirect(route('beneficiaries.index'));
        }

        $beneficiaries = $this->beneficiariesRepository->update($request->all(), $id);
        $firmbeneficiaries = $this->beneficiariesRepository->updateFirmBeneficiary($request,$id);

        Flash::success('Beneficiaries updated successfully.');

        return redirect(route('beneficiaries.index'));
    }

    /**
     * Remove the specified beneficiaries from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $beneficiaries = $this->beneficiariesRepository->find($id);

        if (empty($beneficiaries)) {
            Flash::error('Beneficiaries not found');

            return redirect(route('beneficiaries.index'));
        }

        $this->beneficiariesRepository->delete($id);
        $firmbeneficiaries = FirmBeneficiary::where('beneficiary_id',$id)->delete();

        Flash::success('Beneficiaries deleted successfully.');

        return redirect(route('beneficiaries.index'));
    }
}
