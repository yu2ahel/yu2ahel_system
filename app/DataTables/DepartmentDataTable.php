<?php

namespace App\DataTables;

use App\Models\Department;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class DepartmentDataTable extends DataTable
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

        $dataTable =  $dataTable->addColumn('action', 'departments.datatables_actions')
        ->addColumn('photo', function($data){
            return "<img src=".$data->photo." width=50px; height=50px; />";
        })
        ->addColumn('supervisor_id', function($data){
            return ($data->supervisor) ? $data->supervisor->name : null;
        });
        if (!Auth::user()->permiisionsOwner('manage department')) {
            $dataTable->addColumn('action', null);
        }
        return $dataTable->rawColumns(['photo','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\departments $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Department $model)
    {
        $query = $model->newQuery()
        ->with(['firm','supervisor']);
        if ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER ) && !empty(Auth::user()->firm)) {
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
            'name'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.name"), 'data'=>'name']),
            'brief'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.brief"), 'data'=>'brief']),
            'description' => new \Yajra\DataTables\Html\Column(['title'=>__("app.description"), 'data'=>'description']),
            'photo'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.photo"), 'data'=>'photo']),
            'firm_id'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.firm") , 'data'=>'firm.ar_name']),
            'supervisor_id'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'departments_datatable_' . time();
    }
}
