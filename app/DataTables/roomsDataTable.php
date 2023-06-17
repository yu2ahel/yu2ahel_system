<?php

namespace App\DataTables;

use App\Models\Room;
use App\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class roomsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'rooms.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\rooms $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Room $model)
    {
        $query =  $model->newQuery()->with(['branch']);
        if ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER) && !empty(Auth::user()->firm)) {
            return $query
            ->leftJoin('firm_branches', 'firm_branches.id', '=', 'rooms.branch_id')
            ->where('firm_branches.firm_id',Auth::user()->firm->id);
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
            'room_name'=>new \Yajra\DataTables\Html\Column(['title'=>__("app.room_name") , 'data'=>'room_name']),
            'room_capacity'=>new \Yajra\DataTables\Html\Column(['title'=>__("app.room_capacity") , 'data'=>'room_capacity']),
            'branch_id' =>new \Yajra\DataTables\Html\Column(['title'=>__("app.branch") , 'data'=>'branch.name'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'rooms_datatable_' . time();
    }
}
