<?php

namespace App\Http\Controllers;

use App\DataTables\countriesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatecountriesRequest;
use App\Http\Requests\UpdatecountriesRequest;
use App\Repositories\countriesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class countriesController extends AppBaseController
{
    /** @var  countriesRepository */
    private $countriesRepository;

    public function __construct(countriesRepository $countriesRepo)
    {
        $this->countriesRepository = $countriesRepo;
    }

    /**
     * Display a listing of the countries.
     *
     * @param countriesDataTable $countriesDataTable
     * @return Response
     */
    public function index(countriesDataTable $countriesDataTable)
    {
        return $countriesDataTable->render('countries.index');
    }

    /**
     * Show the form for creating a new countries.
     *
     * @return Response
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created countries in storage.
     *
     * @param CreatecountriesRequest $request
     *
     * @return Response
     */
    public function store(CreatecountriesRequest $request)
    {
        $input = $request->all();

        $countries = $this->countriesRepository->create($input);

        Flash::success('Countries saved successfully.');

        return redirect(route('countries.index'));
    }

    /**
     * Display the specified countries.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $countries = $this->countriesRepository->find($id);

        if (empty($countries)) {
            Flash::error('Countries not found');

            return redirect(route('countries.index'));
        }

        return view('countries.show')->with('countries', $countries);
    }

    /**
     * Show the form for editing the specified countries.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $countries = $this->countriesRepository->find($id);

        if (empty($countries)) {
            Flash::error('Countries not found');

            return redirect(route('countries.index'));
        }

        return view('countries.edit')->with('countries', $countries);
    }

    /**
     * Update the specified countries in storage.
     *
     * @param  int              $id
     * @param UpdatecountriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecountriesRequest $request)
    {
        $countries = $this->countriesRepository->find($id);

        if (empty($countries)) {
            Flash::error('Countries not found');

            return redirect(route('countries.index'));
        }

        $countries = $this->countriesRepository->update($request->all(), $id);

        Flash::success('Countries updated successfully.');

        return redirect(route('countries.index'));
    }

    /**
     * Remove the specified countries from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $countries = $this->countriesRepository->find($id);

        if (empty($countries)) {
            Flash::error('Countries not found');

            return redirect(route('countries.index'));
        }

        $this->countriesRepository->delete($id);

        Flash::success('Countries deleted successfully.');

        return redirect(route('countries.index'));
    }
}
