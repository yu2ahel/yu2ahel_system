<?php

namespace App\DataTables;

use App\Models\BeneficiaryAccountingRecord;
use App\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class beneficiary_accounting_recordsDataTable extends DataTable
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
        ->addColumn('transaction_type', function($data){
            return $data->getRecordTypeLable();
        })
        ->addColumn('beneficiary_id', function($data){
            return ($data->beneficiary) ? $data->beneficiary->full_name : null;
        })
        ->addColumn('action', 'beneficiary_accounting_records.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\beneficiary_accounting_records $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BeneficiaryAccountingRecord $model)
    {
        $query =  $model->newQuery();
        if ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER) && !empty(Auth::user()->firm)) {
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
            'beneficiary_id'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.beneficiary_id"), 'data'=>'beneficiary_id']),
            'transaction_type'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.transaction_type"), 'data'=>'transaction_type']),
            'amount'=> new \Yajra\DataTables\Html\Column(['title'=>__("app.amount"), 'data'=>'amount'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'beneficiary_accounting_records_datatable_' . time();
    }
}
