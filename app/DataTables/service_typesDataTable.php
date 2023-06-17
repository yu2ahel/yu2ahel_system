<?php

namespace App\DataTables;

use App\Models\ServiceType;
use App\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class service_typesDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'service_types.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\service_types $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ServiceType $model)
    {
        $query = $model->newQuery()
        ->with(['service','department']);
        if ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER) && !empty(Auth::user()->firm)) {
            return $query
            ->leftJoin('departments', 'service_types.department_id', '=', 'departments.id')
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
            ->addAction(['title' => __('app.actions'),'width' => '20px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[1, 'desc']],
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
            'name'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.name"), 'data'=>'name']),
            'average_time_in_minutes'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.average_time_in_minutes"), 'data'=>'average_time_in_minutes']),
            'default_price_regular'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.default_price_regular"), 'data'=>'default_price_regular']),
            'default_price_urgent'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.default_price_urgent"), 'data'=>'default_price_urgent']),
            'default_price_discount'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.default_price_discount"), 'data'=>'default_price_discount']),
            'is_freeable'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.is_freeable"), 'data'=>'is_freeable']),
            // 'service_id' =>new \Yajra\DataTables\Html\Column(['title'=>"service" , 'data'=>'service.name']),
            // 'department_id' =>new \Yajra\DataTables\Html\Column(['title'=>"Department" , 'data'=>'department.name'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'service_types_datatable_' . time();
    }
}
