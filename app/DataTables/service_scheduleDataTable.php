<?php

namespace App\DataTables;

use App\Models\ServiceSchedule;
use App\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class service_scheduleDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
        ->addColumn('accounting_type', function($data){
            return $data->getAccountingTypeLable();
        })
        ->addColumn('date_time', function($data){
            return  $data->date_time;
        })
        ->addColumn('service_provider_id', function($data){
            return ($data->service_provider) ? $data->service_provider->name : null;
        })
        ->addColumn('action', 'service_schedules.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\service_schedule $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ServiceSchedule $model)
    {
        $query =  $model->newQuery()->with(['beneficiary','service_provider','branch','service_type','department','room']);
        if ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER) && !empty(Auth::user()->firm)) {
            return $query
            ->leftJoin('departments', 'service_schedule.department_id', '=', 'departments.id')
            ->where('departments.firm_id',Auth::user()->firm->id);
        }elseif (Auth::user()->type == User::TYPE_ADMIN) {
            return $query;
        }else {
            return $query->where('id',null);
        }

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '20px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'beneficiary_id'=>new \Yajra\DataTables\Html\Column(['title'=>"beneficiary" , 'data'=>'beneficiary.full_name']),
            'service_provider_id',
            'branch_id'=>new \Yajra\DataTables\Html\Column(['title'=>"branch" , 'data'=>'branch.name']),
            'service_type_id'=>new \Yajra\DataTables\Html\Column(['title'=>"service type" , 'data'=>'service_type.name']),
            'department_id'=>new \Yajra\DataTables\Html\Column(['title'=>"department" , 'data'=>'department.name']),
            'room_id'=>new \Yajra\DataTables\Html\Column(['title'=>"room" , 'data'=>'room.room_name']),
            'date_time',
            'accounting_type',
            'base_fees',
            'extra_fees',
            'extra_fees_note',
            'total_fees'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'service_schedules_datatable_' . time();
    }
}
