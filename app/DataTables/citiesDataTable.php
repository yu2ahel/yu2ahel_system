<?php

namespace App\DataTables;

use App\Models\City;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class citiesDataTable extends DataTable
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


        return $dataTable->addColumn('action', 'cities.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\cities $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(City $model)
    {
        return $model->newQuery()->with(['country']);
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
            'en_name'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.en_name"), 'data'=>'en_name']),
            'ar_name'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.ar_name"), 'data'=>'ar_name']),
            'country' => new \Yajra\DataTables\Html\Column(['title'=>__("app.country") , 'data'=>'country.ar_name'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'cities_datatable_' . time();
    }
}
