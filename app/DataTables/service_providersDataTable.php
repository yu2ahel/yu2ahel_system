<?php

namespace App\DataTables;

use App\Models\ServiceProvider;
use App\User;
use Illuminate\Support\Facades\Auth;
use PDO;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class service_providersDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'service_providers.datatables_actions')
        ->addColumn('photo', function($data){
            return "<img src=".$data->photo." width=50px; height=50px; />";
        })
        ->addColumn('id_type', function($data){
            return $data->getStatusLable();
        })
        ->addColumn('gender', function($data){
            return $data->getGenderLable();
        })
        ->rawColumns(['photo','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\service_providers $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ServiceProvider $model)
    {
        $query =  $model->newQuery()->with(['user']);
        if ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER) && !empty(Auth::user()->firm)) {
            return $query
            ->leftJoin('firm_service_providers', 'firm_service_providers.service_provider_id', '=', 'service_providers.id')
            ->where('firm_service_providers.firm_id',Auth::user()->firm->id);
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
            'photo'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.photo"), 'data'=>'photo']),
            'id_number'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.id_number"), 'data'=>'id_number']),
            'id_type'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.id_type"), 'data'=>'id_type']),
            'gender'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.gender"), 'data'=>'gender']),
            'about'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.about"), 'data'=>'about']),
            'user' => new \Yajra\DataTables\Html\Column(['title'=>__("app.user name") , 'data'=>'user.name'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'service_providers_datatable_' . time();
    }
}
