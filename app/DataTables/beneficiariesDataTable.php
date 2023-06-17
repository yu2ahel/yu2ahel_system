<?php

namespace App\DataTables;

use App\Models\Beneficiary;
use App\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class beneficiariesDataTable extends DataTable
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
        ->addColumn('type', function($data){
            return $data->getTypeLable();
        })
        ->addColumn('action', 'beneficiaries.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\beneficiaries $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Beneficiary $model)
    {
        $query =  $model->newQuery();
        if ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER ) && !empty(Auth::user()->firm)) {
            return $query
            ->leftJoin('firm_beneficiaries', 'firm_beneficiaries.beneficiary_id', '=', 'beneficiaries.id')
            ->where('firm_beneficiaries.firm_id',Auth::user()->firm->id);
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
            'full_name'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.full_name"), 'data'=>'full_name']),
            'type'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.type"), 'data'=>'type']),
            'date_of_birth'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.date_of_birth"), 'data'=>'date_of_birth']),
            'transferred_from'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.transferred_from"), 'data'=>'transferred_from']),
            'about'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.about"), 'data'=>'about']),
            'degree'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.degree"), 'data'=>'degree']),
            'occupation'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.occupation"), 'data'=>'occupation'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'beneficiaries_datatable_' . time();
    }
}
