<?php

namespace App\Http\Controllers;

use App\DataTables\service_scheduleDataTable;
use App\Http\Requests;
use App\Http\Requests\Createservice_scheduleRequest;
use App\Http\Requests\Updateservice_scheduleRequest;
use App\Repositories\service_scheduleRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\ServiceSchedule;
use App\Models\ServiceType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Response;

class serviceScheduleController extends AppBaseController
{
    /** @var  service_scheduleRepository */
    private $serviceScheduleRepository;

    public function __construct(service_scheduleRepository $serviceScheduleRepo)
    {
        $this->serviceScheduleRepository = $serviceScheduleRepo;
    }

    /**
     * Display a listing of the service_schedule.
     *
     * @param service_scheduleDataTable $serviceScheduleDataTable
     * @return Response
     */
    public function index(service_scheduleDataTable $serviceScheduleDataTable)
    {
        return $serviceScheduleDataTable->render('service_schedules.index');
    }

    /**
     * Show the form for creating a new service_schedule.
     *
     * @return Response
     */
    public function create()
    {
        return view('service_schedules.create');
    }

    /**
     * Store a newly created service_schedule in storage.
     *
     * @param Createservice_scheduleRequest $request
     *
     * @return Response
     */
    public function store(Createservice_scheduleRequest $request)
    {
        $input = $request->all();

        $serviceSchedule = $this->serviceScheduleRepository->create($input);

        for ($i=0; $i < $input['repeat']; $i++) {
            $input['date_time'] = Carbon::parse( $input['date_time'])->addDays(7)->toDateTimeString();
            DB::transaction(function () use ($input) {
                $serviceSchedule = $this->serviceScheduleRepository->create($input);
            });
        }
        Flash::success('Service Schedule saved successfully.');

        return redirect(route('serviceSchedules.index'));
    }

    /**
     * Display the specified service_schedule.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviceSchedule = $this->serviceScheduleRepository->find($id);

        if (empty($serviceSchedule)) {
            Flash::error('Service Schedule not found');

            return redirect(route('serviceSchedules.index'));
        }

        return view('service_schedules.show')->with('serviceSchedule', $serviceSchedule);
    }

    /**
     * Show the form for editing the specified service_schedule.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serviceSchedule = $this->serviceScheduleRepository->find($id);

        if (empty($serviceSchedule)) {
            Flash::error('Service Schedule not found');

            return redirect(route('serviceSchedules.index'));
        }

        return view('service_schedules.edit')->with('serviceSchedule', $serviceSchedule);
    }

    /**
     * Update the specified service_schedule in storage.
     *
     * @param  int              $id
     * @param Updateservice_scheduleRequest $request
     *
     * @return Response
     */
    public function update($id, Updateservice_scheduleRequest $request)
    {
        $serviceSchedule = $this->serviceScheduleRepository->find($id);

        if (empty($serviceSchedule)) {
            Flash::error('Service Schedule not found');

            return redirect(route('serviceSchedules.index'));
        }

        $serviceSchedule = $this->serviceScheduleRepository->update($request->all(), $id);

        Flash::success('Service Schedule updated successfully.');

        return redirect(route('serviceSchedules.index'));
    }

    /**
     * Remove the specified service_schedule from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviceSchedule = $this->serviceScheduleRepository->find($id);

        if (empty($serviceSchedule)) {
            Flash::error('Service Schedule not found');

            return redirect(route('serviceSchedules.index'));
        }

        $this->serviceScheduleRepository->delete($id);

        Flash::success('Service Schedule deleted successfully.');

        return redirect(route('serviceSchedules.index'));
    }

    public function getServiceTypes(Request $request)
    {
        $id = $request->id;
        $serviceTypes = ServiceType::where('department_id',$id)->pluck('name','id')->toArray();
        if (!empty($serviceTypes)) {
            // array_unshift($serviceTypes,[-1=>null]);
            // array_unshift($serviceTypes,[-1=>null]);
            $serviceTypes[0] = "" ;
        log::debug($serviceTypes);
        return $serviceTypes;
        }else{
            return [];
        }

    }

    // public function getServicePrice(Request $request)
    // {
    //     $id = $request->id;
    //     $accounting_type = $request->accounting_type;
    //     // log::debug($accounting_type);
    //     // log::debug($id);
    //     $serviceTypes = ServiceType::where('department_id',$id)->pluck('name','id')->toArray();
    //     if (!empty($serviceTypes)) {
    //         return $serviceTypes;
    //     }else{
    //         return [];
    //     }

    // }

    public function getBaseFees(Request $request)
    {
        $id = $request->service_type;
        $accounting_type = $request->accounting_type;
        $base = $extra = 0;
        $extra = (is_numeric($request->extra_fees)) ? $request->extra_fees : 0 ;
        if (!empty($id) && !empty($accounting_type)) {
            $base = ($accounting_type != ServiceSchedule::FREE) ? ServiceType::where('id',$id)->value(ServiceType::accountingTypesCoulmn($accounting_type)) : 0;
        }
        $final = $base + $extra;

        log::debug($base);
        log::debug($accounting_type);
        log::debug($id);
        // number_format((float)$foo, 2, '.', '');
        return ['base'=>number_format((float)$base, 2, '.', ''),'final'=>number_format((float)$final, 2, '.', '')];
        // $serviceTypes = ServiceType::where('department_id',$id)->pluck('name','id')->toArray();
        // if (!empty($serviceTypes)) {
        //     return $serviceTypes;
        // }else{
        //     return [];
        // }

    }
}
