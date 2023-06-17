<?php

namespace App\Http\Controllers;

use App\DataTables\firmsDataTable;
use App\Events\FirmAdminCreatedEvent;
use App\Http\Requests;
use App\Http\Requests\CreatefirmsRequest;
use App\Http\Requests\UpdatefirmsRequest;
use App\Repositories\firmsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Firm;
use Response;

class firmsController extends AppBaseController
{
    /** @var  firmsRepository */
    private $firmsRepository;

    public function __construct(firmsRepository $firmsRepo)
    {
        $this->firmsRepository = $firmsRepo;
    }

    /**
     * Display a listing of the firms.
     *
     * @param firmsDataTable $firmsDataTable
     * @return Response
     */
    public function index(firmsDataTable $firmsDataTable)
    {
        return $firmsDataTable->render('firms.index');
    }

    /**
     * Show the form for creating a new firms.
     *
     * @return Response
     */
    public function create()
    {
        $firm = new Firm ;
        $userItems = $firm->availableFirms();

        return view('firms.create')->with('userItems',$userItems);
    }

    /**
     * Store a newly created firms in storage.
     *
     * @param CreatefirmsRequest $request
     *
     * @return Response
     */
    public function store(CreatefirmsRequest $request)
    {
        $input = $request->all();

        $firm = $this->firmsRepository->create($input);
        event(new FirmAdminCreatedEvent($firm->id));

        Flash::success('Firm saved successfully.');

        return redirect(route('firms.index'));
    }

    /**
     * Display the specified firms.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $firms = $this->firmsRepository->find($id);

        if (empty($firms)) {
            Flash::error('Firms not found');

            return redirect(route('firms.index'));
        }

        return view('firms.show')->with('firms', $firms);
    }

    /**
     * Show the form for editing the specified firms.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $firms = $this->firmsRepository->find($id);

        if (empty($firms)) {
            Flash::error('Firms not found');

            return redirect(route('firms.index'));
        }
        $userItems = $firms->availableFirms();

        return view('firms.edit')->with('firms', $firms)->with('userItems',$userItems);
    }

    /**
     * Update the specified firms in storage.
     *
     * @param  int              $id
     * @param UpdatefirmsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefirmsRequest $request)
    {
        $firms = $this->firmsRepository->find($id);

        if (empty($firms)) {
            Flash::error('Firms not found');

            return redirect(route('firms.index'));
        }

        $firms = $this->firmsRepository->update($request->all(), $id);

        Flash::success('Firms updated successfully.');

        return redirect(route('firms.index'));
    }

    /**
     * Remove the specified firms from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $firms = $this->firmsRepository->find($id);

        if (empty($firms)) {
            Flash::error('Firms not found');

            return redirect(route('firms.index'));
        }

        $this->firmsRepository->delete($id);

        Flash::success('Firms deleted successfully.');

        return redirect(route('firms.index'));
    }
}
