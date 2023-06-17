<?php

namespace App\DataTables;

use App\Models\UserType;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

use function Psy\debug;

class user_typeDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'user_types.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\user_type $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UserType $model)
    {
        $query =  $model->newQuery()->select('user_type.*','user_groups.name as group_name','user_groups.id as group_id')
        ->leftJoin('user_groups', 'user_groups.id', '=', 'user_type.user_group_id');
        if (Auth::user()->type == User::TYPE_FIRM_ADMIN && !empty(Auth::user()->firm)) {
            return $query
            ->where('user_groups.firm_id',Auth::user()->firm->id);
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
            'name' => new \Yajra\DataTables\Html\Column(['title'=>__("app.name"), 'data'=>'name']),
            'description' => new \Yajra\DataTables\Html\Column(['title'=>__("app.description"), 'data'=>'description']),
            'is_dashboard_accesable'=>new \Yajra\DataTables\Html\Column(['title'=>__("app.is_dashboard_accesable"), 'data'=>'is_dashboard_accesable']),
            'user_group_id' => new \Yajra\DataTables\Html\Column(['title'=>__("app.user groups") , 'data'=>'group_name']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'user_types_datatable_' . time();
    }
}
