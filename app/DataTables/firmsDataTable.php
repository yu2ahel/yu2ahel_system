<?php

namespace App\DataTables;

use App\Models\Firm;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class firmsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'firms.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\firms $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Firm $model)
    {
        return $model->newQuery()->with(['city','user']);
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
            'en_name'=>new \Yajra\DataTables\Html\Column(['title'=>__("app.en_name"), 'data'=>'en_name']),
            'ar_name'=>new \Yajra\DataTables\Html\Column(['title'=>__("app.ar_name"), 'data'=>'ar_name']),
            'ar_about_firm'=>new \Yajra\DataTables\Html\Column(['title'=>__("app.ar_about_firm"), 'data'=>'ar_about_firm']),
            'en_about_firm'=>new \Yajra\DataTables\Html\Column(['title'=>__("app.en_about_firm"), 'data'=>'en_about_firm']),
            // 'date_of_establishment',
            // 'tax_register_no',
            'commercial_register_no'=>new \Yajra\DataTables\Html\Column(['title'=>__("app.commercial_register_no"), 'data'=>'commercial_register_no']),
            'firm_classification'=>new \Yajra\DataTables\Html\Column(['title'=>__("app.firm_classification"), 'data'=>'firm_classification']),
            'main_branch_address'=>new \Yajra\DataTables\Html\Column(['title'=>__("app.main_branch_address"), 'data'=>'ar_about_firm']),
            'main_branch_city_id'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.city") , 'data'=>'city.ar_name']),
            // 'user_id'=> new \Yajra\DataTables\Html\Column(['title'=>"user" , 'data'=>'user.name'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'firms_datatable_' . time();
    }
}
