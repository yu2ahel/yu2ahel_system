<?php

namespace App\DataTables;

use App\Models\CaseDetail;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class case_detailsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'case_details.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\case_details $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CaseDetail $model)
    {
        return $model->newQuery();
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
            'beneficiary_id'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.beneficiary_id"), 'data'=>'beneficiary_id']),
            'last_diagnosis'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.last_diagnosis"), 'data'=>'last_diagnosis']),
            'initial_diagnosis'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.initial_diagnosis"), 'data'=>'initial_diagnosis']),
            'family_social_status'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.family_social_status"), 'data'=>'family_social_status']),
            'father_occupation'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.father_occupation"), 'data'=>'father_occupation']),
            'mother_occupation'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.mother_occupation"), 'data'=>'mother_occupation']),
            'escorter_name'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.escorter_name"), 'data'=>'escorter_name']),
            'notes'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.notes"), 'data'=>'notes'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'case_details_datatable_' . time();
    }
}
