<?php

namespace App\DataTables;

use App\Models\ServiceProviderService;
use App\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class service_provider_servicesDataTable extends DataTable
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
        ->addColumn('service_provider_id', function($data){
            return ($data->supervisor) ? $data->supervisor->name : null;
        })
        ->addColumn('action', 'service_provider_services.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\service_provider_services $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ServiceProviderService $model)
    {
        $query = $model->newQuery()
        ->with(['firm','supervisor','servicetype']);
        if ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER) && !empty(Auth::user()->firm)) {
            return $query->where('firm_id',Auth::user()->firm->id);
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
            ->addAction(['title' => __('app.actions'),'width' => '20px', 'printable' => false])
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
            'firm_id' => new \Yajra\DataTables\Html\Column(['title'=>__("app.firm"), 'data'=>'firm.ar_name']),
            // 'firm_id' => new \Yajra\DataTables\Html\Column(['title'=>"firm" , 'data'=>'firm.ar_name']),
            // 'service_type_id' => new \Yajra\DataTables\Html\Column(['title'=>"service type" , 'data'=>'servicetype.name']),
            'service_type_id' => new \Yajra\DataTables\Html\Column(['title'=>__("app.service type") , 'data'=>'servicetype.name']),
            'service_provider_id'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.service_provider_id"), 'data'=>'service_provider_id']),
            'service_provider_percentage'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.service_provider_percentage"), 'data'=>'service_provider_percentage']),
            'price_regular'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.price_regular"), 'data'=>'price_regular']),
            'price_urgent'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.price_urgent"), 'data'=>'price_urgent']),
            'price_discount'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.price_discount"), 'data'=>'price_discount']),
            'is_free_accepted'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.is_free_accepted"), 'data'=>'is_free_accepted'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'service_provider_services_datatable_' . time();
    }
}
