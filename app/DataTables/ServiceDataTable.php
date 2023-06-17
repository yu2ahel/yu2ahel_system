<?php

namespace App\DataTables;

use App\Models\Service;
use App\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ServiceDataTable extends DataTable
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
        $dataTable->addColumn('action', 'services.datatables_actions');
        if (!Auth::user()->permiisionsOwner('manage service')) {
            $dataTable->addColumn('action', null);
        }
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\services $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Service $model)
    {
        $query = $model->newQuery()
        ->with(['firm']);
        if ((Auth::user()->type == User::TYPE_FIRM_ADMIN ||  Auth::user()->type == User::TYPE_FIRM_USER ) && !empty(Auth::user()->firm)) {
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
            ->addAction(['title' => __('actions'),'width' => '20px', 'printable' => false])
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
            'name' => new \Yajra\DataTables\Html\Column(['title'=>__("app.name"), 'data'=>'name']),
            'description'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.description"), 'data'=>'description']),
            'percentage_discount_for_group_service'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.percentage_discount_for_group_service"), 'data'=>'percentage_discount_for_group_service']),
            'is_schedulable'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.is_schedulable"), 'data'=>'is_schedulable']),
            'is_plannable'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.is_plannable"), 'data'=>'is_plannable']),
            'is_attendable'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.is_attendable"), 'data'=>'is_attendable']),
            'firm_id' =>new \Yajra\DataTables\Html\Column(['title'=>__("app.firm") , 'data'=>'firm.ar_name'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'services_datatable_' . time();
    }
}
