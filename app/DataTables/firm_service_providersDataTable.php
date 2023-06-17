<?php

namespace App\DataTables;

use App\Models\FirmServiceProvider;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class firm_service_providersDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'firm_service_providers.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\firm_service_providers $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(FirmServiceProvider $model)
    {
        return $model->newQuery()->with('firm','service_providor','user_type');
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
            'job_title',
            'basic_salary',
            'default_services_percentage',
            'date_of_registration',
            'firm_id' => new \Yajra\DataTables\Html\Column(['title'=>"firm" , 'data'=>'firm.ar_name']),
            'service_provider_id' => new \Yajra\DataTables\Html\Column(['title'=>"provider" , 'data'=>'service_providor.name']),
            'user_type_id' => new \Yajra\DataTables\Html\Column(['title'=>"user Type" , 'data'=>'user_type.name']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'firm_service_providers_datatable_' . time();
    }
}
